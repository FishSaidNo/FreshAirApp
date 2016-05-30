use airbeamtest

DELIMITER //
 CREATE PROCEDURE GetAllProducts(
 IN MSTitlePar nvarchar(500),
  IN SMSMessagePar nvarchar(500),
  IN RecievedFromPar nvarchar(500),
   IN RecievedIpPar nvarchar(500) 
   )
   BEGIN

insert into RecievedSMS( SMSTitle,
SMSMessage,
RecievedFrom,
RecievedIp,
CreatedOn,
ModifiedOn)
 select MSTitlePar ,SMSMessagePar ,RecievedFromPar ,RecievedIpPar 
 
 
   END //
 DELIMITER ;
 