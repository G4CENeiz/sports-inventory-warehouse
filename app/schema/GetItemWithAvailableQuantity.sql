CREATE FUNCTION dbo.GetItemWithAvailableQuantity()
RETURNS TABLE
AS
RETURN
(
    SELECT ItemId, ItemName, ItemType, QuantityAvailable, QuantityTotal
    FROM Items
    WHERE QuantityAvailable > 0
);