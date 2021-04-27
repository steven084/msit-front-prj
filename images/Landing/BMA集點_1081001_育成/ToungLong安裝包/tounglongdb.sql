-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2019-08-27 16:18:44
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `tounglongdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `accountpoint`
--

CREATE TABLE `accountpoint` (
  `ID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `Processing` varchar(50) NOT NULL COMMENT '處理方式',
  `Point` int(11) NOT NULL,
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='帳戶點數領取資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `account_news`
--

CREATE TABLE `account_news` (
  `ID` int(11) NOT NULL,
  `News` varchar(1024) NOT NULL COMMENT '消息內容',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `es_accountID` int(11) NOT NULL COMMENT '使用者ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='使用者消息資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `es_account`
--

CREATE TABLE `es_account` (
  `ID` int(11) NOT NULL,
  `Account` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `functionID` varchar(1024) NOT NULL,
  `SystemID` int(11) NOT NULL COMMENT '系統ID',
  `householdID` int(11) NOT NULL COMMENT '住戶ID',
  `Point` int(11) NOT NULL COMMENT '使用者目前點數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `es_account`
--

INSERT INTO `es_account` (`ID`, `Account`, `Password`, `ClassID`, `functionID`, `SystemID`, `householdID`, `Point`) VALUES
(0, 'csumis', 'csumis', 0, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,', 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `es_accountclass`
--

CREATE TABLE `es_accountclass` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `functionID` varchar(1024) NOT NULL,
  `SystemID` int(11) NOT NULL COMMENT '系統ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `es_accountclass`
--

INSERT INTO `es_accountclass` (`ID`, `Name`, `functionID`, `SystemID`) VALUES
(0, 'SystemTemp', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `es_building`
--

CREATE TABLE `es_building` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL COMMENT '棟別名稱',
  `Address` varchar(1024) NOT NULL COMMENT '棟別地址',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `communityID` int(11) NOT NULL COMMENT '社區ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='社區棟別資料表';

--
-- 資料表的匯出資料 `es_building`
--

INSERT INTO `es_building` (`ID`, `Name`, `Address`, `Remark`, `Maintainer`, `ChangeDay`, `communityID`) VALUES
(0, 'SystemTemp', 'SystemTemp', 'SystemTemp', 'csumis', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `es_community`
--

CREATE TABLE `es_community` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL COMMENT '社區名稱',
  `NameCode` varchar(50) NOT NULL COMMENT '社區代號',
  `Address` varchar(1024) NOT NULL COMMENT '社區地址',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='社區資料表';

--
-- 資料表的匯出資料 `es_community`
--

INSERT INTO `es_community` (`ID`, `Name`, `NameCode`, `Address`, `Remark`, `Maintainer`, `ChangeDay`) VALUES
(0, 'SystemTemp', 'SystemTemp', 'SystemTemp', '', 'csumis', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `es_communityparm`
--

CREATE TABLE `es_communityparm` (
  `ID` int(11) NOT NULL,
  `HouPayTitle` varchar(50) NOT NULL COMMENT 'HouPayTitle',
  `es_communityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='社區參數資料表';

--
-- 資料表的匯出資料 `es_communityparm`
--

INSERT INTO `es_communityparm` (`ID`, `HouPayTitle`, `es_communityID`) VALUES
(0, 'SystemTemp管理委員會', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `es_compayitem`
--

CREATE TABLE `es_compayitem` (
  `ID` int(11) NOT NULL,
  `ClassName` varchar(50) NOT NULL COMMENT '類別名稱',
  `ItemName` varchar(50) NOT NULL COMMENT '項目名稱',
  `ItemCode` varchar(50) NOT NULL COMMENT '項目代碼',
  `DefaultMoney` int(11) NOT NULL COMMENT '預設金額',
  `DefaultDisMoney` int(11) NOT NULL COMMENT '預設折扣金額',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `communityID` int(11) NOT NULL COMMENT '社區資料表ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='社區繳費項目資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `es_compaystatus`
--

CREATE TABLE `es_compaystatus` (
  `ID` int(11) NOT NULL,
  `EnterMoney` int(11) NOT NULL COMMENT '入帳金額',
  `EnterTime` datetime NOT NULL COMMENT '入帳時間',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `houpaystatusID` int(11) NOT NULL COMMENT '住戶繳費狀態資料表ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='社區繳費入帳狀態資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `es_function`
--

CREATE TABLE `es_function` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `FileName` varchar(50) NOT NULL,
  `Icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `es_function`
--

INSERT INTO `es_function` (`ID`, `Name`, `FileName`, `Icon`) VALUES
(1, '系統社區權限使用設置', 'systemSet', 'fas fa-vihara'),
(2, '社區資料維護', 'communityMaintain', 'fas fa-vihara'),
(3, '棟別資料維護', 'buildingMaintain', 'fas fa-vihara'),
(4, '棟別住戶資料維護', 'houseHolderMaintain', 'fas fa-user-friends'),
(5, '使用者權限設置', 'permissionSet', 'fas fa-vihara'),
(6, '使用者帳戶維護', 'userAccountMaintain', 'fas fa-tasks'),
(7, '使用者帳戶資訊', 'userAccountMaintain2', 'fas fa-tasks'),
(8, '系統最新消息維護', 'newsMaintain', 'fas fa-tasks'),
(9, '使用者消息通知', 'userNewsMaintain', 'fas fa-tasks'),
(10, '社區繳費項目維護', 'comPayItemMaintain', 'fas fa-tasks'),
(11, '住戶繳費項目預設維護', 'houpayitemdefMaintain', 'fas fa-tasks'),
(12, '住戶繳費項目維護', 'houPayItemMaintain', 'fas fa-tasks'),
(13, '社區參數設定', 'comParmSet', 'fas fa-cog'),
(14, '住戶繳費登記(未繳費)(全)', 'houPayRegister', 'fas fa-cog'),
(15, '住戶繳費登記(未繳費)(保)', 'houPayRegister2', 'fas fa-cog'),
(16, '住戶繳費狀態維護(已繳費)', 'houPayStatusMaintain', 'fas fa-tasks'),
(17, '繳費流水號註銷處理', 'houPayRegisterPro', 'fas fa-tasks'),
(18, '繳費流水號刪除處理', 'houPayRegisterPro2', 'fas fa-tasks'),
(19, '社區繳費入帳登記(未入帳)', 'comPayRegister', 'fas fa-cog'),
(20, '社區繳費入帳狀態(已入帳)', 'comPayStatusMaintain', 'fas fa-tasks'),
(21, '使用者狀態', 'userStatus', 'fas fa-tasks'),
(22, '使用者點數處理', 'userPointProcessing', 'fas fa-cog'),
(23, '商城利潤分配設定', 'shProfitSetting', 'fas fa-cog'),
(24, '商城商品類別維護', 'shMdseClassMaintain', 'fas fa-cog'),
(25, '商城商品登記', 'shMdseRegister', 'fas fa-cog'),
(26, '商城商品記錄', 'shMdseRecording', 'fas fa-tasks'),
(27, '商城商品審核', 'shMdseMaintain', 'fas fa-tasks'),
(28, '商城商品維護', 'shMdseMaintain2', 'fas fa-tasks'),
(29, '商城廣告維護', 'shCarouselMaintain', 'fas fa-tasks'),
(30, '商城首頁', 'shMain', 'fas fa-store'),
(31, '商城購物車', 'shShoppingCart', 'fas fa-shopping-cart'),
(32, '商城使用者訂單資訊', 'shUserOrder', 'fas fa-tasks'),
(33, '商城廠商訂單資訊', 'shUserOrder2', 'fas fa-tasks'),
(34, '商城社區訂單資訊', 'shUserOrder3', 'fas fa-tasks'),
(35, '商城訂單維護-到貨', 'shOrderMaintain', 'fas fa-tasks'),
(36, '商城訂單維護-完成', 'shOrderMaintain2', 'fas fa-tasks'),
(37, '訂單繳費入帳登記(未入帳)', 'shOrderStatusRegister', 'fas fa-cog'),
(38, '訂單繳費入帳狀態(已入帳)', 'shOrderStatusMaintain', 'fas fa-tasks');

-- --------------------------------------------------------

--
-- 資料表結構 `es_houpayitem`
--

CREATE TABLE `es_houpayitem` (
  `ID` int(11) NOT NULL,
  `PayPeriodTime` varchar(50) NOT NULL COMMENT '繳費期間(年/月)',
  `Money` int(11) NOT NULL COMMENT '金額',
  `DiscountMoney` int(11) NOT NULL COMMENT '折扣金額',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `householdID` int(11) NOT NULL COMMENT '棟別住戶ID',
  `compayitemID` int(11) NOT NULL COMMENT '繳費項目ID',
  `buildingID` int(11) NOT NULL COMMENT '棟別ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='住戶繳費項目資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `es_houpayitemdefault`
--

CREATE TABLE `es_houpayitemdefault` (
  `ID` int(11) NOT NULL,
  `DefaultMoney` int(11) NOT NULL COMMENT '預設金額',
  `DefaultDisMoney` int(11) NOT NULL COMMENT '預設折扣金額',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `es_compayitemID` int(11) NOT NULL COMMENT '社區繳費項目ID',
  `householdID` int(11) NOT NULL COMMENT '住戶ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='住戶繳費項目預設資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `es_houpayitemnum`
--

CREATE TABLE `es_houpayitemnum` (
  `ID` int(11) NOT NULL,
  `Number` varchar(50) NOT NULL COMMENT '流水號',
  `PayPeriodTime` varchar(50) NOT NULL COMMENT '繳費期間',
  `Cancellation` varchar(50) NOT NULL COMMENT '是否註銷',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `es_communityID` int(11) NOT NULL COMMENT '社區ID',
  `es_houpayitemID` int(11) NOT NULL COMMENT '住戶繳費項目ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='住戶繳費項目流水號資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `es_houpaystatus`
--

CREATE TABLE `es_houpaystatus` (
  `ID` int(11) NOT NULL,
  `PayPeriodTime` varchar(50) NOT NULL COMMENT '繳費期間(年/月)',
  `PayTime` datetime NOT NULL COMMENT '繳費時間',
  `PayMoney` int(11) NOT NULL COMMENT '繳費金額',
  `PayDisMoney` int(11) NOT NULL COMMENT '繳費折扣金額',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `houpayitemID` int(11) NOT NULL COMMENT '住戶繳費項目ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='住戶繳費狀態資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `es_household`
--

CREATE TABLE `es_household` (
  `ID` int(11) NOT NULL,
  `HouseNum` varchar(50) NOT NULL COMMENT '戶號',
  `Name` varchar(50) NOT NULL COMMENT '所有權人',
  `Gender` varchar(50) NOT NULL COMMENT '性別',
  `Birthday` varchar(50) NOT NULL COMMENT '生日',
  `IdentityID` varchar(50) NOT NULL COMMENT '身份證字號',
  `Phone` varchar(50) NOT NULL COMMENT '連絡電話',
  `EMAIL` varchar(50) NOT NULL COMMENT 'EMAIL',
  `Address` varchar(1024) NOT NULL COMMENT '帳單地址',
  `ERName` varchar(50) NOT NULL COMMENT '緊急聯絡人',
  `ERPhone` varchar(50) NOT NULL COMMENT '緊急聯絡人電話',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `buildingID` int(11) NOT NULL COMMENT '棟別ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='社區棟別住戶資料表';

--
-- 資料表的匯出資料 `es_household`
--

INSERT INTO `es_household` (`ID`, `HouseNum`, `Name`, `Gender`, `Birthday`, `IdentityID`, `Phone`, `EMAIL`, `Address`, `ERName`, `ERPhone`, `Remark`, `Maintainer`, `ChangeDay`, `buildingID`) VALUES
(0, 'SystemTemp', 'SystemTemp', '男', 'SystemTemp', 'SystemTemp', 'SystemTemp', 'SystemTemp', 'SystemTemp', 'SystemTemp', 'SystemTemp', 'SystemTemp', 'SystemTemp', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `es_news`
--

CREATE TABLE `es_news` (
  `ID` int(11) NOT NULL,
  `News` varchar(1024) NOT NULL,
  `Maintainer` varchar(50) NOT NULL,
  `ChangeDay` datetime NOT NULL,
  `SystemID` int(11) NOT NULL COMMENT '系統ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='最新消息';

-- --------------------------------------------------------

--
-- 資料表結構 `es_system`
--

CREATE TABLE `es_system` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL COMMENT '系統名稱',
  `CommunityID` varchar(1024) NOT NULL COMMENT '社區ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系統';

--
-- 資料表的匯出資料 `es_system`
--

INSERT INTO `es_system` (`ID`, `Name`, `CommunityID`) VALUES
(0, 'SystemTemp', '0,');

-- --------------------------------------------------------

--
-- 資料表結構 `sh_carousel`
--

CREATE TABLE `sh_carousel` (
  `ID` int(11) NOT NULL,
  `ImgPath` varchar(1024) NOT NULL,
  `CommunityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商城廣告圖片資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `sh_mdse`
--

CREATE TABLE `sh_mdse` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL COMMENT '商品名稱',
  `Description` varchar(1024) NOT NULL COMMENT '商品描述',
  `Price` int(11) NOT NULL COMMENT '商品價格',
  `Number` int(11) NOT NULL COMMENT '商品數量',
  `ImgPath` varchar(1024) NOT NULL COMMENT '商品圖片路徑',
  `ImgPath2` varchar(1024) NOT NULL COMMENT '商品圖片路徑2',
  `ImgPath3` varchar(1024) NOT NULL COMMENT '商品圖片路徑3',
  `ImgPath4` varchar(1024) NOT NULL COMMENT '商品圖片路徑4',
  `ImgPath5` varchar(1024) NOT NULL COMMENT '商品圖片路徑5',
  `HandlingFee` int(11) NOT NULL COMMENT '手續費',
  `IsShelf` varchar(50) NOT NULL COMMENT '是否上架',
  `VerifyStatus` varchar(50) NOT NULL COMMENT '審核狀態',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護人',
  `ChangeDay` datetime NOT NULL COMMENT '異動日期',
  `mdseclassID` int(11) NOT NULL COMMENT '商品類別ID',
  `accountID` int(11) NOT NULL COMMENT '使用者ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商城商品資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `sh_mdseclass`
--

CREATE TABLE `sh_mdseclass` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL COMMENT '類別名稱',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `communityID` int(11) NOT NULL COMMENT '社區ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商城商品類別資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `sh_order`
--

CREATE TABLE `sh_order` (
  `ID` int(11) NOT NULL,
  `es_accountID` int(11) NOT NULL COMMENT '訂購人ID',
  `orderStatus` varchar(50) NOT NULL COMMENT '訂單狀態',
  `ChangeDay` datetime NOT NULL COMMENT '訂購日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='訂單資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `sh_orderdetails`
--

CREATE TABLE `sh_orderdetails` (
  `ID` int(11) NOT NULL,
  `sh_mdseID` int(11) NOT NULL COMMENT '訂購商品ID',
  `Name` varchar(50) NOT NULL COMMENT '商品名稱',
  `Number` int(11) NOT NULL COMMENT '數量',
  `Price` int(11) NOT NULL COMMENT '價格',
  `sh_orderID` int(11) NOT NULL COMMENT '訂單編號ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='訂單詳細資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `sh_orderstatus`
--

CREATE TABLE `sh_orderstatus` (
  `ID` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL COMMENT '狀態',
  `Money` int(11) NOT NULL COMMENT '金額',
  `HandlingFee` int(11) NOT NULL COMMENT '手續費',
  `Remark` varchar(1024) NOT NULL COMMENT '備註',
  `Maintainer` varchar(50) NOT NULL COMMENT '維護者',
  `ChangeDay` datetime NOT NULL COMMENT '異動日',
  `sh_orderID` int(11) NOT NULL COMMENT '訂單編號ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='訂單入帳狀態資料表';

-- --------------------------------------------------------

--
-- 資料表結構 `sh_salesprofit`
--

CREATE TABLE `sh_salesprofit` (
  `ID` int(11) NOT NULL,
  `profitRate` int(11) NOT NULL COMMENT '利潤率',
  `es_accountID` int(11) NOT NULL COMMENT '給予使用者ID',
  `es_communityID` int(11) NOT NULL COMMENT '社區ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='產品銷售利潤分配資料表';

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `accountpoint`
--
ALTER TABLE `accountpoint`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `accountID` (`accountID`),
  ADD KEY `accountID_2` (`accountID`);

--
-- 資料表索引 `account_news`
--
ALTER TABLE `account_news`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `es_accountID` (`es_accountID`);

--
-- 資料表索引 `es_account`
--
ALTER TABLE `es_account`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClassID` (`ClassID`),
  ADD KEY `SystemID` (`SystemID`),
  ADD KEY `householdID` (`householdID`);

--
-- 資料表索引 `es_accountclass`
--
ALTER TABLE `es_accountclass`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `SystemID` (`SystemID`);

--
-- 資料表索引 `es_building`
--
ALTER TABLE `es_building`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `communityID` (`communityID`);

--
-- 資料表索引 `es_community`
--
ALTER TABLE `es_community`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `es_communityparm`
--
ALTER TABLE `es_communityparm`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `es_communityID` (`es_communityID`);

--
-- 資料表索引 `es_compayitem`
--
ALTER TABLE `es_compayitem`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `communityID` (`communityID`),
  ADD KEY `communityID_2` (`communityID`);

--
-- 資料表索引 `es_compaystatus`
--
ALTER TABLE `es_compaystatus`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `houpaystatusID` (`houpaystatusID`);

--
-- 資料表索引 `es_function`
--
ALTER TABLE `es_function`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `es_houpayitem`
--
ALTER TABLE `es_houpayitem`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `buildingID` (`householdID`),
  ADD KEY `compayitemID` (`compayitemID`),
  ADD KEY `buildingID_2` (`buildingID`);

--
-- 資料表索引 `es_houpayitemdefault`
--
ALTER TABLE `es_houpayitemdefault`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `householdID` (`householdID`),
  ADD KEY `es_compayitemID` (`es_compayitemID`);

--
-- 資料表索引 `es_houpayitemnum`
--
ALTER TABLE `es_houpayitemnum`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `communityID` (`es_communityID`),
  ADD KEY `es_houpayitemID` (`es_houpayitemID`);

--
-- 資料表索引 `es_houpaystatus`
--
ALTER TABLE `es_houpaystatus`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `houpayitemID` (`houpayitemID`);

--
-- 資料表索引 `es_household`
--
ALTER TABLE `es_household`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `buildingID` (`buildingID`);

--
-- 資料表索引 `es_news`
--
ALTER TABLE `es_news`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SystemID` (`SystemID`);

--
-- 資料表索引 `es_system`
--
ALTER TABLE `es_system`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `sh_carousel`
--
ALTER TABLE `sh_carousel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CommunityID` (`CommunityID`);

--
-- 資料表索引 `sh_mdse`
--
ALTER TABLE `sh_mdse`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `mdseclassID` (`mdseclassID`),
  ADD KEY `accountID` (`accountID`);

--
-- 資料表索引 `sh_mdseclass`
--
ALTER TABLE `sh_mdseclass`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `communityID` (`communityID`),
  ADD KEY `communityID_2` (`communityID`);

--
-- 資料表索引 `sh_order`
--
ALTER TABLE `sh_order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `es_accountID` (`es_accountID`);

--
-- 資料表索引 `sh_orderdetails`
--
ALTER TABLE `sh_orderdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `sh_mdseID` (`sh_mdseID`),
  ADD KEY `sh_orderID` (`sh_orderID`);

--
-- 資料表索引 `sh_orderstatus`
--
ALTER TABLE `sh_orderstatus`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `sh_orderID` (`sh_orderID`);

--
-- 資料表索引 `sh_salesprofit`
--
ALTER TABLE `sh_salesprofit`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `es_accountID` (`es_accountID`),
  ADD KEY `es_communityID` (`es_communityID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `accountpoint`
--
ALTER TABLE `accountpoint`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `account_news`
--
ALTER TABLE `account_news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_account`
--
ALTER TABLE `es_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_accountclass`
--
ALTER TABLE `es_accountclass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_building`
--
ALTER TABLE `es_building`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_community`
--
ALTER TABLE `es_community`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_communityparm`
--
ALTER TABLE `es_communityparm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_compayitem`
--
ALTER TABLE `es_compayitem`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_compaystatus`
--
ALTER TABLE `es_compaystatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_function`
--
ALTER TABLE `es_function`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- 使用資料表 AUTO_INCREMENT `es_houpayitem`
--
ALTER TABLE `es_houpayitem`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_houpayitemdefault`
--
ALTER TABLE `es_houpayitemdefault`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_houpayitemnum`
--
ALTER TABLE `es_houpayitemnum`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_houpaystatus`
--
ALTER TABLE `es_houpaystatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_household`
--
ALTER TABLE `es_household`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_news`
--
ALTER TABLE `es_news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `es_system`
--
ALTER TABLE `es_system`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `sh_carousel`
--
ALTER TABLE `sh_carousel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `sh_mdse`
--
ALTER TABLE `sh_mdse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `sh_mdseclass`
--
ALTER TABLE `sh_mdseclass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `sh_order`
--
ALTER TABLE `sh_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `sh_orderdetails`
--
ALTER TABLE `sh_orderdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `sh_orderstatus`
--
ALTER TABLE `sh_orderstatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `sh_salesprofit`
--
ALTER TABLE `sh_salesprofit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `accountpoint`
--
ALTER TABLE `accountpoint`
  ADD CONSTRAINT `accountpoint_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `es_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `account_news`
--
ALTER TABLE `account_news`
  ADD CONSTRAINT `account_news_ibfk_1` FOREIGN KEY (`es_accountID`) REFERENCES `es_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_account`
--
ALTER TABLE `es_account`
  ADD CONSTRAINT `es_account_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `es_accountclass` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `es_account_ibfk_2` FOREIGN KEY (`SystemID`) REFERENCES `es_system` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `es_account_ibfk_3` FOREIGN KEY (`householdID`) REFERENCES `es_household` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_accountclass`
--
ALTER TABLE `es_accountclass`
  ADD CONSTRAINT `es_accountclass_ibfk_1` FOREIGN KEY (`SystemID`) REFERENCES `es_system` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_building`
--
ALTER TABLE `es_building`
  ADD CONSTRAINT `es_building_ibfk_1` FOREIGN KEY (`communityID`) REFERENCES `es_community` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_communityparm`
--
ALTER TABLE `es_communityparm`
  ADD CONSTRAINT `es_communityparm_ibfk_1` FOREIGN KEY (`es_communityID`) REFERENCES `es_community` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_compayitem`
--
ALTER TABLE `es_compayitem`
  ADD CONSTRAINT `es_compayitem_ibfk_1` FOREIGN KEY (`communityID`) REFERENCES `es_community` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_compaystatus`
--
ALTER TABLE `es_compaystatus`
  ADD CONSTRAINT `es_compaystatus_ibfk_1` FOREIGN KEY (`houpaystatusID`) REFERENCES `es_houpaystatus` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_houpayitem`
--
ALTER TABLE `es_houpayitem`
  ADD CONSTRAINT `es_houpayitem_ibfk_1` FOREIGN KEY (`compayitemID`) REFERENCES `es_compayitem` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `es_houpayitem_ibfk_2` FOREIGN KEY (`householdID`) REFERENCES `es_household` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `es_houpayitem_ibfk_3` FOREIGN KEY (`buildingID`) REFERENCES `es_building` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_houpayitemdefault`
--
ALTER TABLE `es_houpayitemdefault`
  ADD CONSTRAINT `es_houpayitemdefault_ibfk_1` FOREIGN KEY (`householdID`) REFERENCES `es_household` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `es_houpayitemdefault_ibfk_2` FOREIGN KEY (`es_compayitemID`) REFERENCES `es_compayitem` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_houpayitemnum`
--
ALTER TABLE `es_houpayitemnum`
  ADD CONSTRAINT `es_houpayitemnum_ibfk_1` FOREIGN KEY (`es_communityID`) REFERENCES `es_community` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `es_houpayitemnum_ibfk_2` FOREIGN KEY (`es_houpayitemID`) REFERENCES `es_houpayitem` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_houpaystatus`
--
ALTER TABLE `es_houpaystatus`
  ADD CONSTRAINT `es_houpaystatus_ibfk_1` FOREIGN KEY (`houpayitemID`) REFERENCES `es_houpayitem` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_household`
--
ALTER TABLE `es_household`
  ADD CONSTRAINT `es_household_ibfk_1` FOREIGN KEY (`buildingID`) REFERENCES `es_building` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `es_news`
--
ALTER TABLE `es_news`
  ADD CONSTRAINT `es_news_ibfk_1` FOREIGN KEY (`SystemID`) REFERENCES `es_system` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `sh_carousel`
--
ALTER TABLE `sh_carousel`
  ADD CONSTRAINT `sh_carousel_ibfk_1` FOREIGN KEY (`CommunityID`) REFERENCES `es_community` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `sh_mdse`
--
ALTER TABLE `sh_mdse`
  ADD CONSTRAINT `sh_mdse_ibfk_1` FOREIGN KEY (`mdseclassID`) REFERENCES `sh_mdseclass` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sh_mdse_ibfk_2` FOREIGN KEY (`accountID`) REFERENCES `es_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `sh_mdseclass`
--
ALTER TABLE `sh_mdseclass`
  ADD CONSTRAINT `sh_mdseclass_ibfk_1` FOREIGN KEY (`communityID`) REFERENCES `es_community` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `sh_order`
--
ALTER TABLE `sh_order`
  ADD CONSTRAINT `sh_order_ibfk_1` FOREIGN KEY (`es_accountID`) REFERENCES `es_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `sh_orderdetails`
--
ALTER TABLE `sh_orderdetails`
  ADD CONSTRAINT `sh_orderdetails_ibfk_1` FOREIGN KEY (`sh_orderID`) REFERENCES `sh_order` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sh_orderdetails_ibfk_2` FOREIGN KEY (`sh_mdseID`) REFERENCES `sh_mdse` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `sh_orderstatus`
--
ALTER TABLE `sh_orderstatus`
  ADD CONSTRAINT `sh_orderstatus_ibfk_1` FOREIGN KEY (`sh_orderID`) REFERENCES `sh_order` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `sh_salesprofit`
--
ALTER TABLE `sh_salesprofit`
  ADD CONSTRAINT `sh_salesprofit_ibfk_1` FOREIGN KEY (`es_accountID`) REFERENCES `es_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sh_salesprofit_ibfk_2` FOREIGN KEY (`es_communityID`) REFERENCES `es_community` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
