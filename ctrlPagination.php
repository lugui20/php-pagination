<?php
class CtrlPagination
{
	public function calculate($cPagination, $resultsQty, $pageLimit)
	{
		$erro = 0;
		
		if(isset($_GET["page"]) && is_string($_GET["page"]))
		{
			$currentPage = preg_replace("/[^0-9]/", "", $_GET["page"]);
			if($currentPage == 0) $currentPage = 1;
		}
		else
		{
			$currentPage = 1;
		}
		
		$offset = $pageLimit*($currentPage - 1);
		
		if($offset > $resultsQty) $currentPage = 1;
		
		if($resultsQty > 0) $lastPage = intval(ceil($resultsQty/$pageLimit));
		else $lastPage = 1;
		
		if($currentPage >=  3)
		{
			$pageA = array(1, 1);
			$pageB = array(1, 2);			
			$pageC = array(1, 3);
			if($lastPage == 3)
			{
				$pageD = array(0, 4);
				$pageE = array(0, 5);
			}
			else if($lastPage == 4)
			{
				$pageD = array(1, 4);
				$pageE = array(0,	5);
			}
			else if($lastPage == 5)
			{
				$pageD = array(1, 4);
				$pageE = array(1,	5);
			}
			else if($lastPage >= 6)
			{
				if(($lastPage - $currentPage) >=  2)
				{
					$pageA = array(1, $currentPage - 2);
					$pageB = array(1, $currentPage - 1);			
					$pageC = array(1, $currentPage);
					$pageD = array(1, $currentPage + 1);
					$pageE = array(1, $currentPage + 2);			
				}
				else
				{		
					if(($lastPage - $currentPage) ==  1)
					{
						$pageA = array(1, $currentPage - 3);
						$pageB = array(1, $currentPage - 2);			
						$pageC = array(1, $currentPage - 1);
						$pageD = array(1, $currentPage);
						$pageE = array(1, $currentPage + 1);		
					}
					else
					{						
						$pageA = array(1, $currentPage - 4);
						$pageB = array(1, $currentPage - 3);
						$pageC = array(1, $currentPage - 2);			
						$pageD = array(1, $currentPage - 1);
						$pageE = array(1, $currentPage);
					}
				}
			}							
		}
		else
		{
			if($lastPage >= 1) $pageA = array(1, 1);
			else $pageA = array(0, 1);
			
			if($lastPage >= 2) $pageB = array(1, 2);
			else $pageB = array(0, 2);
			
			if($lastPage >= 3) $pageC = array(1, 3);
			else $pageC = array(0, 3);
			
			if($lastPage >= 4) $pageD = array(1, 4);
			else $pageD = array(0, 4);
			
			if($lastPage >= 5) $pageE = array(1, 5);
			else $pageE = array(0, 5);
		}
		
		if($resultsQty > 0) $inf = $offset + 1;
		else $inf = 0;
		$sup = $offset + $pageLimit;
		if($sup > $resultsQty)
		{
			if($resultsQty > 0) $sup = $offset + ($resultsQty % $pageLimit);
			else $sup = 0;
		}
		$showing = array($inf, $sup, $resultsQty);

		$pagesVector = array(
			0 => array(1, 1),
			1 => $pageA,
			2 => $pageB,
			3 => $pageC, // middle
			4 => $pageD,
			5 => $pageE,
			6 => array(1, $lastPage)
			);
			
		$cPagination->setOffset($offset);
		$cPagination->setCurrentPage($currentPage);
		$cPagination->setLastPage($lastPage);
		$cPagination->setResultsQty($resultsQty);
		$cPagination->setPagesVector($pagesVector);
		$cPagination->setShowing($showing);
				
		return $erro;
	}

	public function draw($cPagination, $intPagination, $baseLink)
	{
		$pagesVector = $cPagination->getPagesVector();
		$currentPage = $cPagination->getCurrentPage();
		$intPagination->viewPagination($pagesVector, $baseLink, $currentPage);	
	}

	public function stats($cPagination, $intPagination)
	{
		$showing = $cPagination->getShowing();
		$intPagination->viewStats($showing);	
	}
}
?>