<?php

namespace src\Models;

use src\Services\Db;
use ReflectionObject;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $name): string
    {
        return lcfirst(str_replace('_', '', ucwords($name, '_')));
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/([A-Z])/', '_$1', $source));
    }

    private function mapPropertiesToDb(): array {
        $excludedProperties = ['authorNickname'];
        $mappedProperties = [];
        
        foreach ($this as $propertyName => $value) {
            if (in_array($propertyName, $excludedProperties)) {
                continue;
            }
            $dbName = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$dbName] = $value;
        }
        
        return $mappedProperties;
    }

    public static function findAll(): ?array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `' . static::getTableName() . '`';
        return $db->query($sql, [], static::class);
    }

    public static function getById(int $id)
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `' . static::getTableName() . '` WHERE `id` = :id';
        $result = $db->query($sql, [':id' => $id], static::class);
        return $result ? $result[0] : null;
    }

    public function save(): void 
    {
        if ($this->getId()) {
            $this->update();
        } else {
            $this->insert();
        }
    }
    
    private function update(): void
    {
        $mappedProperties = $this->mapPropertiesToDb();
        $columnsToUpdate = [];
        $params = [];

        foreach ($mappedProperties as $columnName => $value) {
            if ($columnName === 'id') continue;
            $param = ':' . $columnName;
            $columnsToUpdate[] = "`$columnName` = $param";
            $params[$param] = $value;
        }

        $sql = 'UPDATE `' . static::getTableName() . '` SET ' . implode(', ', $columnsToUpdate) . ' WHERE `id` = :id';
        $params[':id'] = $this->id;


        $db = Db::getInstance();
        $result = $db->query($sql, $params);

    }

    private function insert(): void
    {
        $mappedProperties = $this->mapPropertiesToDb();
        $filteredProperties = array_filter($mappedProperties);

        $columns = [];
        $paramsNames = [];
        $params = [];

        foreach ($filteredProperties as $columnName => $value) {
            $columns[] = "`$columnName`";
            $paramName = ':' . $columnName;
            $paramsNames[] = $paramName;
            $params[$paramName] = $value;
        }

        $sql = 'INSERT INTO `' . static::getTableName() . '` (' . implode(', ', $columns) . ') VALUES (' . implode(', ', $paramsNames) . ')';
        $db = Db::getInstance();
        $db->query($sql, $params);

        $this->id = $db->getLastInsertId();
    }

    public function delete(): void
    {
        $db = Db::getInstance();
        $sql = 'DELETE FROM `' . static::getTableName() . '` WHERE `id` = :id';
        $db->query($sql, [':id' => $this->id]);
    }

    abstract protected static function getTableName(): string;
}