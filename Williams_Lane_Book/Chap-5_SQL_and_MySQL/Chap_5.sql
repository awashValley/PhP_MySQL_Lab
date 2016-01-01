
## --------------------------------- ;
## Querying with SQL SELECT			 ;
## --------------------------------- ;

SELECT surname, firstname, initial 
	FROM customer 
	WHERE initial = "B";

## display current time
SELECT curtime();

## SELECT statement as a calculator
SELECT pi()*(4*4);

## --------------------------------- ;
## WHERE Clauses					 ;
## --------------------------------- ;
SELECT * 
	FROM region
	WHERE region_id <= 3;

## AND / OR
SELECT * 
	FROM customer 
	WHERE surname='Ritterman' AND firstname='Richard';