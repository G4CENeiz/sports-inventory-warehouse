CREATE TABLE [dbo].[Items]
(
    [ItemId]              INT             NOT NULL IDENTITY (1, 1),
    [ItemName]            VARCHAR(255)    NOT NULL,
    [ItemType]            VARCHAR(255)    NOT NULL,
    [QuantityAvailable]   INT             NOT NULL,
    [QuantityTotal]       INT             NOT NULL,
    CONSTRAINT [PK_Items] PRIMARY KEY(ItemId)
);

CREATE TABLE [dbo].[Users]
(
    [UserId]        INT             NOT NULL IDENTITY (1, 1),
    [Username]      VARCHAR(255)    NOT NULL,
    [Password]      VARCHAR(255)    NOT NULL,
    [IdentityNumber]      VARCHAR(255)    NOT NULL,
    [FirstName]      VARCHAR(255)    NOT NULL,
    [LastName]      VARCHAR(255)    NOT NULL,
    [Role]          VARCHAR(255)    NOT NULL,
    CONSTRAINT [PK_Users] PRIMARY KEY(UserId)
);

CREATE TABLE [dbo].[Loan]
(
    [LoanId]            INT             NOT NULL IDENTITY (1, 1),
    [ItemId]            INT             NOT NULL,
    [UserId]            INT             NOT NULL,
    [Quantity]          INT             NOT NULL,
    [LoanDate]          DATE            NOT NULL,
    [DueDate]           DATE            NOT NULL,
    [ReturnDate]        DATE            NULL,
    [Status]        VARCHAR(255)        NOT NULL,
    CONSTRAINT [PK_Loan] PRIMARY KEY(LoanId) 
);

ALTER TABLE [dbo].[Loan] ADD CONSTRAINT [FK_Loan_Item]
    FOREIGN KEY ([ItemId]) REFERENCES [dbo].[Items] ([ItemId]) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE [dbo].[Loan] ADD CONSTRAINT [FK_Loan_User]
    FOREIGN KEY ([UserId]) REFERENCES [dbo].[Users] ([UserId]) ON DELETE CASCADE ON UPDATE CASCADE;