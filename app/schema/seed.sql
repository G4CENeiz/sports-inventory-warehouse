INSERT INTO [dbo].[Items] ([ItemName], [ItemType], [QuantityAvailable], [QuantityTotal])
VALUES ('Basketball', 'Ball', '10', '10'),
        ('Football', 'Ball', '10', '10'),
        ('Baseball', 'Ball', '20', '20'),
        ('Tennisball', 'Ball', '20', '20'),
        ('Volleyball', 'Ball', '10', '10'),
        ('Cone', 'Equipment', '50', '50'),
        ('Roll Meter', 'Equipment', '5', '5'),
        ('Tire', 'Equipment', '10', '10'),
        ('Gloves', 'Equipment', '15', '15'),
        ('Racket', 'Equipment', '5', '5'),
        ('Shuttlecock', 'Equipment', '15', '15');

INSERT INTO [dbo].[Users] ([Username], [Password], [Role])
VALUES ('admin', 'password', 'Admin'),
        ('borrower', 'password', 'Borrower');

INSERT INTO [dbo].[Loan] ([ItemId], [UserId], [Quantity], [LoanDate], [DueDate], [ReturnDate])
VALUES ('1', '1', '2', '2022-01-01', '2022-01-10', NULL);
