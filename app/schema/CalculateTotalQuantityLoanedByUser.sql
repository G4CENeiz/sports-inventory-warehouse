CREATE FUNCTION dbo.CalculateTotalQuantityLoanedByUser (@username VARCHAR(255))
RETURNS INT
AS
BEGIN
    DECLARE @userId INT

    SELECT @userId = UserId
    FROM Users
    WHERE Username = @username

    IF @userId IS NULL
        RETURN 0

    DECLARE @totalQuantityLoaned INT

    SELECT @totalQuantityLoaned = SUM(Quantity)
    FROM Loan
    WHERE UserId = @userId

    IF @totalQuantityLoaned IS NULL
        SET @totalQuantityLoaned = 0

    RETURN @totalQuantityLoaned
END;