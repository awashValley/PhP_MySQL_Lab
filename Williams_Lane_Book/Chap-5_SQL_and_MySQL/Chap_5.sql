
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

## count
SELECT count(*) as sampleSize
	FROM customer;

## destinct
SELECT distinct customer.city		--
	FROM customer
	ORDER BY city;

## display head
SELECT * 
	-- FROM customer limit 5;
	-- FROM customer limit 100,5;	# row 101-105
	FROM customer limit 600,-1;		# all rows after a particular row (NOT WORKING!)

## --------------------------------- ;
## WHERE Clauses					 ;
## --------------------------------- ;
SELECT * 
	FROM region
	WHERE region_id <= 3;

## AND / OR
SELECT * 
	FROM customer 
	WHERE surname='ritterman' AND firstname='Richard';

SELECT cust_id
	FROM  customer
	WHERE (surname='Marzalla' AND firstname LIKE 'M%') OR 
		  birth_date='1980-07-14';


## --------------------------------- ;
## Sorting and Grouping Output		 ;
## --------------------------------- ;
SELECT surname, firstname, initial
	FROM customer
	-- WHERE city='coonawarra' OR city='Longwood'
	WHERE city in ('coonawarra', 'Longwood')		-- possible;
	ORDER BY surname, firstname, initial;

## descending order
SELECT * 
	FROM customer
	WHERE city='Melbourne'
	ORDER BY surname desc;


## GROUP BY
SELECT city, count(*) as Population
	FROM customer
	GROUP BY city;

SELECT city, min(birth_date) as minBD
	FROM customer
	GROUP BY city;

## sort by calculated variables
SELECT city, min(birth_date) as minBD
	FROM customer
	GROUP BY city
	order BY minBD;

## HAVING
SELECT city, count(*) as Population, min(birth_date) as minBD
	FROM customer
	GROUP BY city
	HAVING Population > 10; 

## Excercise [pp. 158]: Suppose we want to find the number of customers with same name
##		who live in each city in the state of Victoria, where the same name is defined
##		as the same first name and surname.
SELECT city, surname, firstname, count(*) as Count
	FROM customer
	WHERE state='VIC'
	GROUP BY surname, firstname, city
	HAVING Count > 2
	ORDER BY city;


## ---------------------------------- ;
## Join Queries						  ;
##		- Beware of Cartesian Product ;
## ---------------------------------- ;

## wrong code
SELECT winery_name, region_name
	FROM winery, region;

## Elementary Natural Joins
SELECT winery_name, region_name 
	FROM winery Natural Join region
	ORDER BY winery_name;

## efficient match
SELECT winery_name, region_name 
	FROM winery, region
	WHERE winery.region_id = region.region_id
	ORDER BY winery_name;

## Excercise
SELECT winery_name, wine_name
	FROM winery, wine
	WHERE winery.winery_id = wine.winery_id
		  AND winery.winery_name like 'Borg%';
	-- ORDER BY winery_name;

## Excercise: find the name of the region that the Ryan Ridge Winery is situated in:
SELECT winery_name, region_name
	FROM winery, region
	WHERE winery.region_id = region.region_id
		  AND winery.winery_name = 'Ryan Ridge Winery';

## Excercise: find which wineries make Tonnibrook wines:
SELECT distinct winery_name, wine_name
	FROM Winery, wine
	WHERE wine.winery_id = wine.winery_id
		  AND wine_name = 'Tonnibrook';

## Excercise: find wines that cost less than $10:
SELECT distinct wine.wine_name, inventory.cost
	FROM wine, inventory
	WHERE wine.wine_id = inventory.wine_id
	      AND inventory.cost < 10;

## Excercise: find which customers ordered wines:
SELECT distinct customer.cust_id, orders.order_date
	FROM customer, orders
	WHERE customer.cust_id = orders.cust_id
	GROUP BY customer.cust_id;


## ---------------------------------- ;
## Joins with More than Two Tables	  ;
## ---------------------------------- ;

## Suppose you want to find the details of the wine purchases made by a customer,
##		including the customer's details, the dates they made an order, and
##		the quantity and the price of the items purchased.
SELECT distinct items.cust_id, customer.surname, customer.firstname, 
	   orders.order_date, 
	   items.wine_id, items.qty, items.price
	FROM customer, orders, items
	WHERE (customer.cust_id = orders.cust_id) AND
		  (orders.cust_id = items.cust_id)	  AND
		  customer.cust_id = 2;


## ------------------------------------------ ;
## Case Study: Adding a New Wine [pp. 168]	  ;
## ------------------------------------------ ;

## find out the next value for wine_id
SELECT max(wine_id) 
	FROM wine; 

## STEP-1: Insert basic infor about the new wine 
INSERT INTO wine 
	SET wine_id=1049,
		wine_name = 'Curry Hill',
		wine_type = 99,				# psuedo value until it's updated		
		year = 1996,			
		winery_id = 9999,			# psuedo value until it's updated					
		description = NULL;			# missing value
		-- description = 'A beautifull mature wine. Ideal with read meat.';

## REMARK: the remaining attributes (the wine_type identifier, the winery_id identifier,
## 		   and the varieties in the winery_variety table) require further querying and 
##		   then subsquent updates

## STEP-2: set the winery_id for the new wine.
##		   We need to search for the Rowley Brook Winery winery to identify the winery_id
SELECT winery_id
	FROM winery
	WHERE winery_name='Rowley Brook Winery';
# This returns winery_id = 298.

## We can now update the new wine row to set the winery_id=298
UPDATE wine 
	SET winery_id = 298 
	WHERE wine_id = 1049;

## STEP-3: It's similar to the second step, i.e., set the wine_type identifier in the wine table.
##		   Discover the wine_type_id for a Red wine:
SELECT wine_type_id
	FROM wine_type
	WHERE wine_type = 'Red';
# This returns wine_type_id=6.

UPDATE wine
	SET wine_type_id=6
	WHERE wine_id=1049;

## STEP-4: set the variety information for the new wine.
##		   We need variety_id values for Cabernet and Merlot.
SELECT * 
	FROM grape_variety
	ORDER BY variety_id;
# Cabernet has variety_id=11 and Merlot variety_id=13.
# 	Thus, we can now insert two rows into the winery_variety table.
#	Because Cabernet is the first variety, set its ID=1, and ID=2 for Merlot.

INSERT INTO wine_variety
	SET wine_id=1049, 
		variety_id = 11,
		id = 1;

INSERT INTO wine_variety
	SET wine_id=1049, 
		variety_id = 13,
		id = 2;

## FINAL STEP: Insert the first inventory row into the inventory table for this wine.
##			   There are 24 bottles, with a per-bottle cost of $14.95.
INSERT INTO inventory
	SET wine_id = 1049,
		inventory_id = 1,
		on_hand = 24,
		cost = 14.95,
		date_added = NOW();


## DONE: Quality Check!!!
SELECT year, wine_name, winery_name, variety, wine_type.wine_type,cost
	FROM wine, winery, wine_variety, grape_variety, wine_type, inventory
	WHERE wine.wine_id = 1049 AND
		  wine.wine_id = wine_variety.wine_id AND
		  wine_variety.variety_id = grape_variety.variety_id AND
		  wine.wine_type_id = wine_type.wine_type_id AND
		  wine.winery_id = winery.winery_id AND
		  wine.wine_id = inventory.wine_id
	ORDER BY wine_variety.id;


































