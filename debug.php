
// Parse error: syntax error, unexpected T_IF in
   DEBUG: check if a semi-colon is forgotten...

// [Sat 09Apr2016]. Error: Cannot Access Empty Property in PHP...
   function reserve($reservationDate){
  		$this->$date =$reservationDate;   // WRRONG - remove $ before 'date'
  		$this->date =$reservationDate;   // hola
  	}
