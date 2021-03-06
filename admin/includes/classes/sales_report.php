<?php
/*
  $Id: sales_report.php,v 0.1 2002/12/06 23:52:29 cwi Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
//Nauman
  class sales_report {
    var $mode, $globalStartDate, $startDate, $endDate, $info, $previous, $next, $startDates, $endDates, $size;

    function sales_report($mode, $startDate = "", $endDate = "") {
	//print_r($mode);
      // startDate and endDate have to be a unix timestamp. Use mktime !
      // if set then both have to be valid startDate and endDate
      $this->mode = $mode;
      $this->previous = "";
      $this->next = "";
      $this->info = array(array());

      // get date of first sale
      $first_query = tep_db_query("select UNIX_TIMESTAMP(min(date_purchased)) as first FROM " . TABLE_ORDERS);
      $first = tep_db_fetch_array($first_query);
      $this->globalStartDate = mktime(0, 0, 0, date("m", $first['first']), date("d", $first['first']), date("Y", $first['first']));
      //echo " $startDate , $endDate ";
      if ($endDate == "" or $startDate == "") {
        
		if($weekNo >= 52)$weekNo=0;
		if($dateofweek == 0)$weekNo=$weekNo+1;
                //echo $weekNo;
		$weekDate = $this->getDaysInWeek($weekNo,date("Y"));
		
		$dateGiven = false;
        $this->startDate = 0;//strtotime($weekDate[0]);
        // endDate is today
        $this->endDate = strtotime($weekDate[1]);
     //$this->endDate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
	   //echo $this->mode ;
	  } else {
        $dateGiven = true;
        //echo "ss";
		if ($endDate > mktime(0, 0, 0, date("m"), date("d"), date("Y"))) {
          $this->endDate = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
        } else {
          // set endDate to the given Date with "round" on days
          $this->endDate = mktime(0, 0, 0, date("m", $endDate), date("d", $endDate) + 1, date("Y", $endDate));
        }
      }
      //echo $this->mode;
	  //echo date("Y-m-d",$this->endDate);
	  switch ($this->mode) {
        // hourly
        case '1':
		//echo "dfdf";
          if ($dateGiven) {
            // "round" to midnight
            $this->startDate = mktime(0, 0, 0, date("m", $startDate), date("d", $startDate), date("Y", $startDate));
            $this->endDate = mktime(0, 0, 0, date("m", $startDate), date("d", $startDate) + 1, date("Y", $startDate));
            // size to number of hours
            $this->size = 24;
          } else {
		
            // startDate to start of this day
            $this->startDate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
            $this->endDate = mktime(date("G") + 1, 0, 0, date("m"), date("d"), date("Y"));
            // size to number of hours
            $this->size = date("G") + 1;
            if ($this->startDate < $this->globalStartDate) {
              $this->startDate = $this->globalStartDate;
            }
          }
          for ($i = 0; $i < $this->size; $i++) {
            $this->startDates[$i] = mktime($i, 0, 0, date("m", $this->startDate), date("d", $this->startDate), date("Y", $this->startDate));
            $this->endDates[$i] = mktime($i + 1, 0, 0, date("m", $this->startDate), date("d", $this->startDate), date("Y", $this->startDate));
          }
          break;
        // day
        case '2':
		  //echo "dfdf";
          if ($dateGiven) {
            // "round" to day
            //echo "dd";
			$this->startDate = mktime(0, 0, 0, date("m", $startDate), date("d", $startDate), date("Y", $startDate));
            //echo date("m-d-Y", $startDate);
			$weekNo = date('W', $startDate);
			$dateofweek = date("w",$endDate);
			if($dateofweek == 0)$weekNo=$weekNo+1;
			// size to number of days
             $this->size = ($this->endDate - $this->startDate) / (60 * 60 * 24);
             if($this->size > 7 )$this->size=7;
		  } else {
            // startDate to start of this week
            
			$weekNo = date('W', time());
			if($weekNo >= 52)$weekNo=0;
			$dateofweek = date("w");
			if($dateofweek == 0)$weekNo=$weekNo+1;
			$weekDate = $this->getDaysInWeek($weekNo,date("Y"));
			
			$this->startDate = strtotime($weekDate[0]);//mktime(0, 0, 0, date("m"), date("d") - date("w"), date("Y"));
            $this->endDate = strtotime($weekDate[1]);//mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
            // size to number of days
              $this->size = date("w") + 1;
            if ($this->startDate < $this->globalStartDate) {
              $this->startDate = $this->globalStartDate;
            }
          }
          for ($i = 0; $i < $this->size; $i++) {
            $this->startDates[$i] = mktime(0, 0, 0, date("m", $this->startDate), date("d", $this->startDate) + $i, date("Y", $this->startDate));
            $this->endDates[$i] = mktime(0, 0, 0, date("m", $this->startDate), date("d", $this->startDate) + ($i + 1), date("Y", $this->startDate));
          }
          break;
        // week
        case '3':
          //echo "dd";
		  if ($dateGiven) {
            $this->startDate = mktime(0, 0, 0, date("m", $startDate), date("d", $startDate) - date("w", $startDate), date("Y", $startDate));

          } else {
            // startDate to beginning of first week of this month
            $firstDayOfMonth = mktime(0, 0, 0, date("m"), 1, date("Y"));
            $this->startDate = mktime(0, 0, 0, date("m"), 1 - date("w", $firstDayOfMonth), date("Y"));
          }
          if ($this->startDate < $this->globalStartDate) {
            $this->startDate = $this->globalStartDate;
          }
          // size to the number of weeks in this month till endDate
          $this->size = ceil((($this->endDate - $this->startDate + 1) / (60 * 60 * 24)) / 7);
          for ($i = 0; $i < $this->size; $i++) {
            $this->startDates[$i] = mktime(0, 0, 0, date("m", $this->startDate), date("d", $this->startDate) +  $i * 7, date("Y", $this->startDate));
            $this->endDates[$i] = mktime(0, 0, 0, date("m", $this->startDate), date("d", $this->startDate) + ($i + 1) * 7, date("Y", $this->startDate));
          }
          break;
        // month
        case '4':
          //echo $dateGiven." its test <br>";
          if ($dateGiven) {
            $this->startDate = mktime(0, 0, 0, date("m", $startDate), 1, date("Y", $startDate));
            // size to number of days
          } else {
            // startDate to first day of the first month of this year
            $this->startDate = mktime(0, 0, 0, 1, 1, date("Y"));
            // size to number of months in this year
          }
          //echo date("d-m-Y",$this->startDate);
          if ($this->startDate < $this->globalStartDate) {
            $this->startDate = mktime(0, 0, 0, date("m", $this->globalStartDate), 1, date("Y", $this->globalStartDate));
          }
          $this->endDate = time();
          //echo date("d-m-Y",$this->endDate);
          //echo "<br>";
          $this->size = (date("Y", $this->endDate) - date("Y", $this->startDate)) * 12 + (date("m", $this->endDate) - date("m", $this->startDate)) + 1;
          $tmpMonth = date("m", $this->startDate);
          $tmpYear = date("Y", $this->startDate);
          for ($i = 0; $i < $this->size; $i++) {
            // the first of the $tmpMonth + $i
            $this->startDates[$i] = mktime(0, 0, 0, $tmpMonth + $i, 1, $tmpYear);
            //echo date("d-m-Y",$this->startDates[$i]);
            //echo "<br>";
           
            // the first of the $tmpMonth + $i + 1 month
            $this->endDates[$i] = mktime(0, 0, 0, $tmpMonth + $i + 1, 1, $tmpYear);
            //echo date("d-m-Y",$this->endDates[$i]);
            //echo "<br>";
          }
          //print_r($this->startDates);
          //print_r($this->endDates);
          break;
        // year
        case '5':
          if ($dateGiven) {
            $this->startDate = mktime(0, 0, 0, 1, 1, date("Y", $startDate));
            $this->endDate = mktime(0, 0, 0, 1, 1, date("Y", $endDate) + 1);
          } else {
            // startDate to first of current year - $max_years
            // $this->startDate = mktime(0, 0, 0, 1, 1, date("Y") - 5 + 1);
            $this->startDate = mktime(0, 0, 0, 1, 1, date("Y") - 10 + 1);
            // endDate to today
            $this->endDate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
          }
          if ($this->startDate < $this->globalStartDate) {
            $this->startDate = $this->globalStartDate;
          }
          $this->size = date("Y", $this->endDate) - date("Y", $this->startDate) + 1;
          $tmpYear = date("Y", $this->startDate);
          for ($i = 0; $i < $this->size; $i++) {
            $this->startDates[$i] = mktime(0, 0, 0, 1, 1, $tmpYear + $i);
            $this->endDates[$i] = mktime(0, 0, 0, 1, 1, $tmpYear + $i + 1);
          }
          break;
      }

      if ($this->mode < 3) {
        // set previous to start - diff
        $tmpDiff = $this->endDate - $this->startDate;
        //echo $this->size;
		$tmpUnit = $tmpDiff / $this->size;
        //echo $tmpDiff . " " . $tmpUnit . "<br>";

        switch($this->mode) {
          // hourly
          case '1':
            $tmp1 =  24 * 60 * 60;
            break;
          // daily
          case '2':
             $tmp1 = 7 * 24 * 60 * 60;
           // echo"<br/>";
			break;
          // weekly
          case '3':
            $tmp1 = 30 * 24 * 60 * 60;
            break;
          // monthly
          case '4':
            $tmp1 = 365 * 24 * 60 * 60;
            break;
        }
        //echo $tmp = ceil($tmpDiff / $tmp1);
        if ($tmp > 1) {
          $tmpShift = ($tmp * $tmpDiff) + $tmpUnit;
        } else {
          $tmpShift = $tmp1 + $tmpUnit;
        }
 		$weekDate = $this->getDaysInWeek($weekNo-1,date("Y"));
        //print_r($weekDate);
		$tmpStart = $this->startDate - $tmpShift + $tmpUnit;
        $tmpEnd = $this->startDate - $tmpUnit;
        $tmpStart = strtotime($weekDate[0]);
		$tmpEnd = strtotime($weekDate[1]);
		//echo "<br> $tmpUnit <br>";
		//echo date('m-d-Y',$tmpEnd);
		
		if ($tmpStart >= $this->globalStartDate) {
          //echo strftime("%T %x", $tmpStart). " - " . strftime("%T %x", $tmpEnd) . "<br>";
          $this->previous = "report=" . $this->mode . "&startDate=" . $tmpStart . "&endDate=" . $tmpEnd;
        }

        $tmpStart = $this->endDate;
		$tmpEnd = $this->endDate + $tmpShift - 2 * $tmpUnit;
        if ($tmpEnd < mktime(0, 0, 0, date("m"), date("d"), date("Y"))) {
          //echo strftime("%T %x", $tmpStart). " - " . strftime("%T %x", $tmpEnd);
          $this->next = "report=" . $this->mode . "&startDate=" . $tmpStart . "&endDate=" . $tmpEnd;
        } else {
          if ($tmpEnd - $tmpDiff < mktime(0, 0, 0, date("m"), date("d"), date("Y"))) {
            $tmpEnd = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
            //echo strftime("%T %x", $tmpStart). " - " . strftime("%T %x", $tmpEnd);
            $this->next = "report=" . $this->mode . "&startDate=" . $tmpStart . "&endDate=" . $tmpEnd;
          }
        }
      }

      // if ($dateGiven) {
      //  echo "<br>" . strftime("%H %x", $this->startDate). " - " . strftime("%H %x", $this->endDate);
      //} else {
        $this->query();
      //}
    }

    function query() {

      //$tmp_query =  "select sum(ot.value) as value, avg(ot.value) as avg, count(ot.value) as count FROM " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS . " o WHERE ot.orders_id = o.orders_id and ot.class = 'ot_subtotal'";

      // use order total (to include ship charges) and exclude cancelled orders
      $tmp_query =  "select sum(ot.value) as value, avg(ot.value) as avg, count(ot.value) as count FROM " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS . " o WHERE ot.orders_id = o.orders_id and ot.class = 'ot_total' and o.orders_status <> 4";


      for ($i = 0; $i < $this->size; $i++) {
        $report_query = tep_db_query($tmp_query . " AND o.date_purchased >= '" . tep_db_input(date("Y-m-d\TH:i:s", $this->startDates[$i])) . "' AND o.date_purchased < '" . tep_db_input(date("Y-m-d\TH:i:s", $this->endDates[$i])) . "'");
        
		//echo $tmp_query . " AND o.date_purchased >= '" . tep_db_input(date("Y-m-d\TH:i:s", $this->startDates[$i])) . "' AND o.date_purchased < '" . tep_db_input(date("Y-m-d\TH:i:s", $this->endDates[$i])) . "'";
		//echo "<br>";
		
		$report = tep_db_fetch_array($report_query);
        $this->info[$i]['sum'] = $report['value'];
        $this->info[$i]['avg'] = $report['avg'];
        $this->info[$i]['count'] = $report['count'];
		//print_r($report);
        switch ($this->mode) {
          // hourly
          case '1':
            $this->info[$i]['text'] = strftime("%H", $this->startDates[$i]) . " - " . strftime("%H", $this->endDates[$i]);
            $this->info[$i]['link'] = "";
            break;
          // daily
          case '2':
            //echo "s";
			$this->info[$i]['text'] = strftime("%x", $this->startDates[$i]);
            $this->info[$i]['link'] = "report=1&startDate=" . $this->startDates[$i] . "&endDate=" . mktime(0, 0, 0, date("m", $this->endDates[$i]), date("d", $this->endDates[$i]) + 1, date("Y", $this->endDates[$i]));
            break;
          // weekly
          case '3':
            
			$this->info[$i]['text'] = strftime("%x", $this->startDates[$i]) . " - " . strftime("%x", mktime(0, 0, 0, date("m", $this->endDates[$i]), date("d", $this->endDates[$i]) - 1, date("Y", $this->endDates[$i])));
            $this->info[$i]['link'] = "report=2&startDate=" . $this->startDates[$i] . "&endDate=" . mktime(0, 0, 0, date("m", $this->endDates[$i]), date("d", $this->endDates[$i]) - 1, date("Y", $this->endDates[$i]));
            break;
          // monthly
          case '4':
            $this->info[$i]['text'] = strftime("%b %y", $this->startDates[$i]);
            $this->info[$i]['link'] = "report=3&startDate=" . $this->startDates[$i] . "&endDate=" . mktime(0, 0, 0, date("m", $this->endDates[$i]), date("d", $this->endDates[$i]) - 1, date("Y", $this->endDates[$i]));
            break;
          // yearly
          case '5':
            $this->info[$i]['text'] = date("Y", $this->startDates[$i]);
            $this->info[$i]['link'] = "report=4&startDate=" . $this->startDates[$i] . "&endDate=" . mktime(0, 0, 0, date("m", $this->endDates[$i]) - 1, date("d", $this->endDates[$i]), date("Y", $this->endDates[$i]));
            break;
              }
            }
            $tmp_query =  "select sum(ot.value) as shipping FROM " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS . " o WHERE ot.orders_id = o.orders_id and ot.class = 'ot_shipping'";

            for ($i = 0; $i < $this->size; $i++) {
              $report_query = tep_db_query($tmp_query . " AND o.date_purchased >= '" . tep_db_input(date("Y-m-d\TH:i:s", $this->startDates[$i])) . "' AND o.date_purchased < '" . tep_db_input(date("Y-m-d\TH:i:s", $this->endDates[$i])) . "'");
        $report = tep_db_fetch_array($report_query);
        $this->info[$i]['shipping'] = $report['shipping'];
      }
    }
	
	function getDaysInWeek ($weekNumber, $year) {
	  // Count from '0104' because January 4th is always in week 1
	  // (according to ISO 8601).
            

            $date = new DateTime();
            $date->setISODate($year,$weekNumber);
            //echo $date->format('d-M-Y');  
            
	  //$time = strtotime($year . '0104 +' . ($weekNumber - 1). ' weeks');
	  // Get the time of the first day of the week
	  //$mondayTime = strtotime('-' . (date('w', $time) + 0) . ' days', $time);
          $mondayTime = strtotime($date->format('Y-m-d'));
	  // Get the times of days 0 -> 6
	  $dayTimes = "";
	  for ($i = 0; $i < 7; ++$i) {
		if($i==0){
		$dayTimes[] = date("d-m-Y",strtotime('+' . $i . ' days', $mondayTime))." ";
	    }
		if($i==6){
		$dayTimes[] = date("d-m-Y",strtotime('+' . $i . ' days', $mondayTime))." ";
		}
	  }
	  // Return timestamps for mon-sun.
	  //print_r($dayTimes);
	  return $dayTimes;
	}
	
  }
?>
