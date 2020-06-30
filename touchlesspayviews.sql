create or replace view businessview AS
SELECT `businesstype`.`TypeName`
,`business`.*
FROM `business` 
,`businesstype`
WHERE `business`.`BusinessTypeID` = `businesstype`.`TypeID`;
CREATE OR REPLACE VIEW InvoiceView AS
SELECT	`customer`.`CustomerName`
		,`business`.`BusinessName`
		,`businesstype`.`TypeName`
		,`invoice`.* 
	FROM	`invoice` 
			,`customer`	
			,`business`
			,`businesstype`
	WHERE `invoice`.`CustomerIDv` = `customer`.`CustomerId`
	AND `invoice`.`BusinessID` = `business`.`BusinessID`
	AND `business`.`BusinessTypeID` = `businesstype`.`TypeID`;
CREATE OR REPLACE VIEW InvoiceitemView AS
SELECT	`product`.`ProductName`
		,`business`.`BusinessName`
		,`businesstype`.`TypeName`
		,`invoiceitem`.* 
	FROM	`product`
			,`invoiceitem` 
			,`business`
			,`businesstype`
	WHERE `invoiceitem`.`ProductID` = `product`.`ProductID`
	AND `product`.`BusinessID` = `business`.`BusinessID`
	AND `business`.`BusinessTypeID` = `businesstype`.`TypeID`;
CREATE OR REPLACE VIEW LoginView AS
SELECT `usertype`.`UserTypeName`
,`login`.* 
FROM `login` 
,`usertype`
WHERE `login`.`UserTypeID` = `usertype`.`UserTypeID`;
CREATE OR REPLACE VIEW MerchantView AS
SELECT `business`.`BusinessName`
	,`businesstype`.`TypeName` BusinessTypeName
	,`merchantaccount`.* 
FROM `merchantaccount` 
	,`business`
	,`businesstype`
WHERE `merchantaccount`.`BusinessID` = `business`.`BusinessID`
AND `business`.`BusinessTypeID` = `businesstype`.`TypeID`;
CREATE OR REPLACE VIEW PaymentView AS
SELECT `paymentmethod`.`PayProfileID`
,`customer`.`CustomerName`
,`payment`.* 
FROM `payment` 
,`paymentmethod`
,`customer`
WHERE `payment`.`payMethodID` = `paymentmethod`.`PayMethodID`
AND `paymentmethod`.`CustomerID` = `customer`.`CustomerId`;
CREATE OR REPLACE VIEW PaymentMethodView AS
SELECT `customer`.`CustomerName`
,`paymentmethod`.* 
FROM `paymentmethod` 
,`customer`
WHERE `paymentmethod`.`CustomerID` = `customer`.`CustomerId`;
CREATE OR REPLACE VIEW ProductView AS 
SELECT `business`.`BusinessName`
,`businesstype`.`TypeName` BusinessTypeName
,`product`.* 
FROM `product` 
,`business`
,`businesstype`
WHERE `product`.`BusinessID` = `business`.`BusinessID`
AND `business`.`BusinessTypeID` = `businesstype`.`TypeID`;

