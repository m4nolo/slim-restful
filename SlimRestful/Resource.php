<?php
	
namespace SlimRestful;

abstract class Resource{
	
	private $prefix;
	private $route;
	private $conditions;
	private $middlewares;
	
	public function __construct(){
		$this->prefix = null;
		$this->route = null;
		$this->conditions = array();
		$this->middlewares = array();
	}
	
	public function setPrefix($prefix){
		$this->prefix = $prefix;
	}
	
	public function setRoute($route){
		$this->route = $route;
	}
	
	public function getRoute(){
		return $this->route;
	}
	
	public function getApp(){
		return $this->getApi()->getSlimApp();
	}
	
	public function getApi(){
		return $this->getPrefix()->getSlimRestfulInstance();
	}
	
	public function getPrefix(){
		return $this->prefix;
	}
	
	public function getConditions(){
		return $this->conditions;
	}
	
	public function addCondition($field, $condition){
		$this->conditions[$field] = $condition;
		return $this;
	}
	
	public function setConditions($conditions){
		$this->conditions = $conditions;
	}
	
	public function getMiddlewares(){
		return $this->middlewares;
	}
	
	public function addMiddleware($middleware){
		$this->middlewares[] = $middleware;
		return $this;
	}
	
	public function mergeMiddlewares($middlewares){
		$merged = array_merge($this->middlewares, $middlewares);
		$this->middlewares = $merged;
	}
	
	public function setMiddlewares($middlewares){
		$this->middlewares = $middlewares;
	}
	
}