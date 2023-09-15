<?php

class CPagination
{
	private $offset = 0;
	private $currentPage = 1;
	private $lastPage = 1;
	private $resultsQty = 0;
	private $pagesVector = array();
	private $showing = array();

	public function setOffset($offset) {
		$this->offset = $offset;
	}
	
	public function setCurrentPage($currentPage) {
		$this->currentPage = $currentPage;
	}
	
	public function setLastPage($lastPage) {
		$this->lastPage = $lastPage;
	}
	
	public function setResultsQty($resultsQty) {
		$this->resultsQty = $resultsQty;
	}
	
	public function setPagesVector($pagesVector) {
		$this->pagesVector = $pagesVector;
	}
	
	public function setShowing($showing) {
		$this->showing = $showing;
	}
	
	public function getOffset() {
		return $this->offset;	
	}
	
	public function getCurrentPage() {
		return $this->currentPage;	
	}
	
	public function getLastPage() {
		return $this->lastPage;	
	}
	
	public function getResultsQty() {
		return $this->resultsQty;	
	}
	
	public function getPagesVector() {
		return $this->pagesVector;	
	}
	
	public function getShowing() {
		return $this->showing;	
	}
}
?>