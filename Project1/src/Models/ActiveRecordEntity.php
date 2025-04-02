<?php

namespace src\Models;

use src\Services\Db;
use ReflectionObject;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value): void
    {
        $camelCaseName = $this->underscoreToCamelcase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelcase(string $name): string
    {
        return lcfirst(str_replace('_', '', ucwords($name, '_')));
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/([A-Z])/', '_$1', $source));
    }

    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new ReflectionObject($this);
        $properties = $reflector->getProperties();
        $mappedProperties = [];

        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyDbName = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyDbName] = $this->$propertyName;
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
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id !== null) {
            $this->update($mappedProperties);
        } else {
            $this->insert($mappedProperties);
        }
    }

    private function update(array $mappedProperties): void
    {
        $columns2params = [];
        $params2values = [':id' => $this->id];
        
        foreach ($mappedProperties as $column => $value) {
            if ($column === 'id') continue;
            
            $param = ':' . $column;
            $columns2params[] = "`$column` = $param";
            $params2values[$param] = $value;
        }

        $sql = 'UPDATE `' . static::getTableName() . '` SET ' . implode(', ', $columns2params) . ' WHERE `id` = :id';
        $db = Db::getInstance();
        $db->query($sql, $params2values);
    }

    private function insert(array $mappedProperties): void
    {
        $filteredProperties = array_filter($mappedProperties);

        $columns = [];
        $paramsNames = [];
        $params2values = [];

        foreach ($filteredProperties as $columnName => $value) {
            $columns[] = '`' . $columnName . '`';
            $paramName = ':' . $columnName;
            $paramsNames[] = $paramName;
            $params2values[$paramName] = $value;
        }

        $sql = 'INSERT INTO `' . static::getTableName() . '` (' . implode(', ', $columns) . ') VALUES (' . implode(', ', $paramsNames) . ')';
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getLastInsertId();
    }

    public function delete(): void
    {
        $db = Db::getInstance();
        $sql = 'DELETE FROM `' . static::getTableName() . '` WHERE id = :id';
        $db->query($sql, [':id' => $this->id], static::class);
        $this->id = null;
    }

    abstract protected static function getTableName(): string;
}