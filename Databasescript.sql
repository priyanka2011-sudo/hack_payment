USE [master]
GO
/****** Object:  Database [TOUCHLESSPAY]    Script Date: 2020-06-29 12:26:26 AM ******/
CREATE DATABASE [TOUCHLESSPAY]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'TOUCHLESSPAY', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\TOUCHLESSPAY.DAT' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'TOUCHLESSPAY_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\TOUCHLESSPAY.LOG' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [TOUCHLESSPAY] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [TOUCHLESSPAY].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [TOUCHLESSPAY] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET ARITHABORT OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [TOUCHLESSPAY] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [TOUCHLESSPAY] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET  DISABLE_BROKER 
GO
ALTER DATABASE [TOUCHLESSPAY] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [TOUCHLESSPAY] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [TOUCHLESSPAY] SET  MULTI_USER 
GO
ALTER DATABASE [TOUCHLESSPAY] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [TOUCHLESSPAY] SET DB_CHAINING OFF 
GO
ALTER DATABASE [TOUCHLESSPAY] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [TOUCHLESSPAY] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [TOUCHLESSPAY] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [TOUCHLESSPAY] SET QUERY_STORE = OFF
GO
USE [TOUCHLESSPAY]
GO
/****** Object:  Table [dbo].[Business]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Business](
	[BusinessID] [numeric](18, 0) NOT NULL,
	[BusinessTypeID] [numeric](18, 0) NOT NULL,
	[BusinessName] [varchar](50) NULL,
	[BusinessAddressLine1] [varchar](max) NULL,
	[BusinessAddressLine2] [varchar](max) NULL,
	[BusinessCity] [varchar](50) NULL,
	[BusinessProvince] [varchar](50) NULL,
	[BusinessCountry] [varchar](50) NULL,
	[BusinessPostalCode] [varchar](50) NULL,
	[BusinessPhone] [varchar](50) NULL,
	[BusinessLogo] [image] NULL,
	[BusinessRegNo] [varchar](50) NULL,
	[TaxRegNo] [varchar](50) NULL,
	[TaxPercent] [numeric](18, 0) NULL,
	[CreatedAt] [smalldatetime] NULL,
	[CreatedBy] [varchar](50) NULL,
	[UpdatedAt] [smalldatetime] NULL,
	[UpdatedBy] [varchar](50) NULL,
	[DeletedAt] [smalldatetime] NULL,
	[DeletedBy] [varchar](50) NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_Business] PRIMARY KEY CLUSTERED 
(
	[BusinessID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[BusinessType]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[BusinessType](
	[TypeID] [numeric](18, 0) NOT NULL,
	[TypeName] [nvarchar](50) NULL,
	[CreatedAt] [smalldatetime] NULL,
	[UpdatedAt] [smalldatetime] NULL,
	[DeletedAt] [smalldatetime] NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_BusinessType] PRIMARY KEY CLUSTERED 
(
	[TypeID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Customer]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Customer](
	[CustomerId] [numeric](18, 0) NOT NULL,
	[CustomerName] [varchar](50) NULL,
	[CustomerEmailID] [varchar](50) NULL,
	[CustomerPhone] [numeric](18, 0) NULL,
	[CreatedAt] [smalldatetime] NULL,
	[CreatedBy] [varchar](50) NULL,
	[UpdatedAt] [smalldatetime] NULL,
	[UpdaetdBy] [varchar](50) NULL,
	[DeletedAt] [smalldatetime] NULL,
	[DeletedBy] [varchar](50) NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_Customer] PRIMARY KEY CLUSTERED 
(
	[CustomerId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Invoice]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Invoice](
	[InvoiceID] [numeric](18, 0) NOT NULL,
	[CustomerID] [numeric](18, 0) NOT NULL,
	[BusinessID] [numeric](18, 0) NOT NULL,
	[InvoiceNumber] [numeric](18, 0) NOT NULL,
	[InvoiceDate] [smalldatetime] NOT NULL,
	[PaymentID] [numeric](18, 0) NOT NULL,
	[CreatedAt] [smalldatetime] NOT NULL,
	[CreatedBy] [nvarchar](50) NOT NULL,
	[UpdatedAt] [smalldatetime] NULL,
	[UpdatedBy] [nvarchar](50) NULL,
	[DeletedAt] [smalldatetime] NULL,
	[DeletedBy] [nvarchar](50) NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_Invoice] PRIMARY KEY CLUSTERED 
(
	[InvoiceID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[InvoiceItem]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[InvoiceItem](
	[InvoiceItemID] [numeric](18, 0) NOT NULL,
	[ProductID] [numeric](18, 0) NOT NULL,
	[Quantity] [numeric](18, 0) NOT NULL,
	[Amount] [numeric](18, 0) NOT NULL,
	[CreatedAt] [smalldatetime] NOT NULL,
	[UpdatedAt] [smalldatetime] NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_InvoiceItem] PRIMARY KEY CLUSTERED 
(
	[InvoiceItemID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Login]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Login](
	[LoginID] [numeric](18, 0) NOT NULL,
	[UserTypeID] [numeric](18, 0) NOT NULL,
	[UserID] [numeric](18, 0) NOT NULL,
	[UserName] [varchar](50) NULL,
	[Password] [varchar](50) NULL,
	[CreatedAt] [smalldatetime] NULL,
	[CreatedBy] [varchar](50) NULL,
	[UpdatedAt] [smalldatetime] NULL,
	[UpdateBy] [varchar](50) NULL,
	[DeletedAt] [smalldatetime] NULL,
	[DeletedBy] [varchar](50) NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_Login] PRIMARY KEY CLUSTERED 
(
	[LoginID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[MerchantAccount]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MerchantAccount](
	[MerchantAccountID] [numeric](18, 0) NOT NULL,
	[BusinessID] [numeric](18, 0) NOT NULL,
	[UserName] [nvarchar](50) NOT NULL,
	[Password] [nvarchar](50) NULL,
	[Token] [nvarchar](50) NULL,
	[CreatedAt] [smalldatetime] NOT NULL,
	[UpdatedAt] [smalldatetime] NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_MerchantAccount] PRIMARY KEY CLUSTERED 
(
	[MerchantAccountID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Payment]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Payment](
	[PaymentID] [numeric](18, 0) NOT NULL,
	[PayProfileID] [numeric](18, 0) NOT NULL,
	[MerchantAccountID] [numeric](18, 0) NOT NULL,
	[PaymentAmount] [numeric](18, 0) NOT NULL,
	[Settlement] [nvarchar](50) NULL,
	[CreatedAt] [smalldatetime] NOT NULL,
	[UpdatedAt] [smalldatetime] NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_Payment] PRIMARY KEY CLUSTERED 
(
	[PaymentID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[PaymentMethod]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[PaymentMethod](
	[PayMethodID] [numeric](18, 0) NOT NULL,
	[CustomerID] [numeric](18, 0) NOT NULL,
	[PayProfileID] [numeric](18, 0) NOT NULL,
	[CreatedBy] [nvarchar](50) NOT NULL,
	[UpdatedBy] [nvarchar](50) NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_PaymentMethod] PRIMARY KEY CLUSTERED 
(
	[PayMethodID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Product]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Product](
	[ProductID] [numeric](18, 0) NOT NULL,
	[BusinessID] [numeric](18, 0) NOT NULL,
	[ProductName] [nvarchar](50) NOT NULL,
	[ProductAmount] [numeric](18, 0) NULL,
	[Taxable] [bit] NULL,
	[CreatedAt] [smalldatetime] NOT NULL,
	[UpdatedAt] [smalldatetime] NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_Product] PRIMARY KEY CLUSTERED 
(
	[ProductID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[UserType]    Script Date: 2020-06-29 12:26:26 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[UserType](
	[UserTypeID] [numeric](18, 0) NOT NULL,
	[UserTypeName] [nchar](10) NOT NULL,
	[CreatedAt] [smalldatetime] NOT NULL,
	[UpdatedAt] [smalldatetime] NULL,
	[DeletedAt] [smalldatetime] NULL,
	[IsDeleted] [bit] NULL,
 CONSTRAINT [PK_UserType] PRIMARY KEY CLUSTERED 
(
	[UserTypeID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Business]  WITH CHECK ADD  CONSTRAINT [FK_Business_BusinessType] FOREIGN KEY([BusinessTypeID])
REFERENCES [dbo].[BusinessType] ([TypeID])
GO
ALTER TABLE [dbo].[Business] CHECK CONSTRAINT [FK_Business_BusinessType]
GO
ALTER TABLE [dbo].[Invoice]  WITH CHECK ADD  CONSTRAINT [FK_Invoice_Business] FOREIGN KEY([BusinessID])
REFERENCES [dbo].[Business] ([BusinessID])
GO
ALTER TABLE [dbo].[Invoice] CHECK CONSTRAINT [FK_Invoice_Business]
GO
ALTER TABLE [dbo].[Invoice]  WITH CHECK ADD  CONSTRAINT [FK_Invoice_Customer] FOREIGN KEY([CustomerID])
REFERENCES [dbo].[Customer] ([CustomerId])
GO
ALTER TABLE [dbo].[Invoice] CHECK CONSTRAINT [FK_Invoice_Customer]
GO
ALTER TABLE [dbo].[InvoiceItem]  WITH CHECK ADD  CONSTRAINT [FK_InvoiceItem_Product] FOREIGN KEY([ProductID])
REFERENCES [dbo].[Product] ([ProductID])
GO
ALTER TABLE [dbo].[InvoiceItem] CHECK CONSTRAINT [FK_InvoiceItem_Product]
GO
ALTER TABLE [dbo].[Login]  WITH CHECK ADD  CONSTRAINT [FK_Login_Business] FOREIGN KEY([UserID])
REFERENCES [dbo].[Business] ([BusinessID])
GO
ALTER TABLE [dbo].[Login] CHECK CONSTRAINT [FK_Login_Business]
GO
ALTER TABLE [dbo].[Login]  WITH CHECK ADD  CONSTRAINT [FK_Login_Customer] FOREIGN KEY([LoginID])
REFERENCES [dbo].[Customer] ([CustomerId])
GO
ALTER TABLE [dbo].[Login] CHECK CONSTRAINT [FK_Login_Customer]
GO
ALTER TABLE [dbo].[Login]  WITH CHECK ADD  CONSTRAINT [FK_Login_UserType] FOREIGN KEY([UserTypeID])
REFERENCES [dbo].[UserType] ([UserTypeID])
GO
ALTER TABLE [dbo].[Login] CHECK CONSTRAINT [FK_Login_UserType]
GO
ALTER TABLE [dbo].[MerchantAccount]  WITH CHECK ADD  CONSTRAINT [FK_MerchantAccount_Business] FOREIGN KEY([BusinessID])
REFERENCES [dbo].[Business] ([BusinessID])
GO
ALTER TABLE [dbo].[MerchantAccount] CHECK CONSTRAINT [FK_MerchantAccount_Business]
GO
ALTER TABLE [dbo].[Payment]  WITH CHECK ADD  CONSTRAINT [FK_Payment_MerchantAccount] FOREIGN KEY([MerchantAccountID])
REFERENCES [dbo].[MerchantAccount] ([MerchantAccountID])
GO
ALTER TABLE [dbo].[Payment] CHECK CONSTRAINT [FK_Payment_MerchantAccount]
GO
ALTER TABLE [dbo].[PaymentMethod]  WITH CHECK ADD  CONSTRAINT [FK_PaymentMethod_Customer] FOREIGN KEY([CustomerID])
REFERENCES [dbo].[Customer] ([CustomerId])
GO
ALTER TABLE [dbo].[PaymentMethod] CHECK CONSTRAINT [FK_PaymentMethod_Customer]
GO
ALTER TABLE [dbo].[Product]  WITH CHECK ADD  CONSTRAINT [FK_Product_Business] FOREIGN KEY([BusinessID])
REFERENCES [dbo].[Business] ([BusinessID])
GO
ALTER TABLE [dbo].[Product] CHECK CONSTRAINT [FK_Product_Business]
GO
USE [master]
GO
ALTER DATABASE [TOUCHLESSPAY] SET  READ_WRITE 
GO
