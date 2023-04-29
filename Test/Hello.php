<?php
    $sql = 'INSERT INTO tbl_Account VALUES(username, password, (SELECT ID FROM tbl_GroupPermission WHERE Name LIKE \'Customer\')) WHERE NOT EXISTS(SELECT * FROM `tbl_Account` WHERE `tbl_Account`.`Username` = username)
    INSERT INTO `tbl_Customer`(`tbl_Customer`.`Username`) VALUES(username) WHERE EXISTS(SELECT * FROM `tbl_Account` WHERE `tbl_Account`.`Username` = username) and NOT EXISTS(SELECT * FROM `tbl_Customer` WHERE `tbl_Customer`.`Username` = username)';
?>

CREATE PROCEDURE sp_register (IN username VARCHAR(255), IN password VARCHAR(255))
BEGIN
	DECLARE check_account INT;
    SET check_account = 0;
    SET check_account = 1 WHERE NOT EXISTS(SELECT * FROM `tbl_Account` WHERE`tbl_Account`.`Username` = username);
	INSERT INTO tbl_Account VALUES(username, password, (SELECT ID FROM tbl_GroupPermission WHERE Name LIKE 'Customer')) WHERE check_account = 1;
    INSERT INTO `tbl_Customer`(`tbl_Customer`.`Username`) VALUES(username) WHERE EXISTS(SELECT * FROM `tbl_Account` WHERE `tbl_Account`.`Username` = username) and NOT EXISTS(SELECT * FROM `tbl_Customer` WHERE `tbl_Customer`.`Username` = username);
    RETURN check_account;
END



SET check_account = 0;
SELECT 1 INTO check_account FROM `tbl_Account` WHERE`tbl_Account`.`Username` = username
INSERT INTO tbl_Account VALUES(username, password, (SELECT ID FROM tbl_GroupPermission WHERE Name LIKE 'Customer')) WHERE check_account = 1;
INSERT INTO `tbl_Customer`(`tbl_Customer`.`Username`) VALUES(username) WHERE EXISTS(SELECT * FROM `tbl_Account` WHERE `tbl_Account`.`Username` = username) and NOT EXISTS(SELECT * FROM `tbl_Customer` WHERE `tbl_Customer`.`Username` = username);