-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-10-26 12:27
-- 서버 버전: 10.4.24-MariaDB
-- PHP 버전: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `todaymenu`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `dish`
--

CREATE TABLE `dish` (
  `id_num` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `kcal` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `recommend` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `dish`
--

INSERT INTO `dish` (`id_num`, `name`, `kcal`, `link`, `recommend`) VALUES
(1, '감자전', 110, 'https://www.10000recipe.com/recipe/6915156', 0),
(2, '고사리전', 150, 'https://www.10000recipe.com/recipe/6869967', 0),
(3, '김치전', 130, 'https://www.10000recipe.com/recipe/6911743', 0),
(4, '냉이전', 220, 'https://www.10000recipe.com/recipe/6885658', 0),
(5, '녹두빈대떡', 320, 'https://www.10000recipe.com/recipe/6868614', 0),
(6, '느타리버섯전', 160, 'https://www.10000recipe.com/recipe/6831365', 0),
(7, '늙은호박전', 120, 'https://www.10000recipe.com/recipe/6867994', 0),
(8, '단호박전', 100, 'https://www.10000recipe.com/recipe/6879305', 0),
(9, '계란말이', 284, 'https://www.10000recipe.com/recipe/6988340', 0),
(10, '달래전', 240, 'https://www.10000recipe.com/recipe/6746213', 0),
(11, '더덕전', 140, 'https://www.10000recipe.com/recipe/5310050', 0),
(12, '도토리묵전', 110, 'https://www.10000recipe.com/recipe/6904786', 0),
(13, '두릅전', 170, 'https://www.10000recipe.com/recipe/5947541', 0),
(14, '두부채소전', 100, 'https://www.10000recipe.com/recipe/6947668', 0),
(15, '미나리해물전', 180, 'https://www.10000recipe.com/recipe/6976313', 0),
(16, '치즈감자전', 200, 'https://www.10000recipe.com/recipe/6863890', 0),
(17, '부추전', 271, 'https://www.10000recipe.com/recipe/6846066', 1),
(18, '삼치전', 230, 'https://www.10000recipe.com/recipe/6925188', 0),
(19, '새우전', 150, 'https://www.10000recipe.com/recipe/6844553', 0),
(20, '소시지전', 130, 'https://www.10000recipe.com/recipe/6922033', 0),
(21, '쑥전', 250, 'https://www.10000recipe.com/recipe/6894965', 0),
(22, '애호박전', 150, 'https://www.10000recipe.com/recipe/6903842', 0),
(23, '양송이버섯전', 120, 'https://www.10000recipe.com/recipe/6902351', 0),
(24, '연근전', 110, 'https://www.10000recipe.com/recipe/6832941', 0),
(25, '완자전', 170, 'https://www.10000recipe.com/recipe/6864422', 0),
(26, '청포묵전', 180, 'https://www.10000recipe.com/recipe/4902940', 0),
(27, '표고전', 160, 'https://www.10000recipe.com/recipe/6924888', 0),
(28, '풋고추전', 110, 'https://www.10000recipe.com/recipe/6869407', 0),
(29, '두릅산적', 180, 'https://www.10000recipe.com/recipe/6887651', 0),
(30, '떡산적', 150, 'https://www.10000recipe.com/recipe/4521219', 0),
(31, '섭산적', 110, 'https://www.10000recipe.com/recipe/6926729', 0),
(32, '장산적', 100, 'https://www.10000recipe.com/recipe/6900413', 0),
(33, '지짐누름적', 140, 'https://www.10000recipe.com/recipe/6883123', 0),
(34, '화양적', 130, 'https://www.10000recipe.com/recipe/5281198', 0),
(35, '가자미식해', 400, 'https://www.10000recipe.com/recipe/6905994', 0),
(36, '가지장아찌', 30, 'https://www.10000recipe.com/recipe/6969329', 1),
(37, '건새우볶음', 40, 'https://www.10000recipe.com/recipe/6872547', 0),
(38, '고춧잎장아찌', 30, 'https://www.10000recipe.com/recipe/6983976', 0),
(39, '골뱅이오이무침', 70, 'https://www.10000recipe.com/recipe/1911449', 0),
(40, '김부각', 110, 'https://www.10000recipe.com/recipe/6893936', 0),
(41, '깻잎장아찌', 40, 'https://www.10000recipe.com/recipe/6878910', 0),
(42, '꽃게장', 40, 'https://www.10000recipe.com/recipe/6912317', 0),
(43, '대구포무침', 90, 'https://www.10000recipe.com/recipe/6865477', 0),
(44, '더덕장아찌', 50, 'https://www.10000recipe.com/recipe/897837', 0),
(45, '마늘장아찌', 60, 'https://www.10000recipe.com/recipe/6850442', 0),
(46, '마늘쫑양념무침', 60, 'https://www.10000recipe.com/recipe/6891443', 0),
(47, '매실장아찌', 20, 'https://www.10000recipe.com/recipe/4283530', 0),
(48, '명란젓', 20, 'https://www.10000recipe.com/recipe/6878068', 0),
(49, '무말랭이무침', 112, 'https://www.10000recipe.com/recipe/6838023', 0),
(50, '무숙장아찌', 60, 'https://www.10000recipe.com/recipe/6921940', 0),
(51, '무장아찌', 40, 'https://www.10000recipe.com/recipe/6856337', 0),
(52, '미역무초무침', 40, 'https://www.10000recipe.com/recipe/6866190', 0),
(53, '북어채무침', 70, 'https://www.10000recipe.com/recipe/6859266', 0),
(54, '소라무침', 90, 'https://www.10000recipe.com/recipe/6866729', 0),
(55, '어리굴젓', 80, 'https://www.10000recipe.com/recipe/6863715', 0),
(56, '오이장아찌', 30, 'https://www.10000recipe.com/recipe/2820864', 0),
(57, '오이지무침', 10, 'https://www.10000recipe.com/recipe/6870224', 1),
(58, '오징어볶음', 170, 'https://www.10000recipe.com/recipe/6903507', 0),
(59, '쥐어채무침', 70, NULL, 0),
(60, '창란젓', 20, 'https://www.10000recipe.com/recipe/4269881', 0),
(61, '콩자반', 50, 'https://www.10000recipe.com/recipe/6876733', 0),
(62, '풋고추멸치볶음', 238, 'https://www.10000recipe.com/recipe/6875568', 0),
(63, '호두장아찌', 300, NULL, 0),
(64, '갓김치', 40, 'https://www.10000recipe.com/recipe/6888892', 0),
(65, '꼬들빼기김치', 40, 'https://www.10000recipe.com/recipe/1485882', 0),
(66, '깍두기', 20, 'https://www.10000recipe.com/recipe/6868573', 0),
(67, '깻잎김치', 50, 'https://www.10000recipe.com/recipe/6876121', 0),
(68, '나박김치', 10, 'https://www.10000recipe.com/recipe/6854112', 1),
(69, '동치미', 10, 'https://www.10000recipe.com/recipe/6861975', 1),
(70, '배추겉절이', 50, 'https://www.10000recipe.com/recipe/6838648', 0),
(71, '배추김치', 20, 'https://www.10000recipe.com/recipe/6847924', 0),
(72, '백김치', 20, 'https://www.10000recipe.com/recipe/6867904', 0),
(73, '부추김치', 40, 'https://www.10000recipe.com/recipe/6840833', 0),
(74, '열무김치', 20, 'https://www.10000recipe.com/recipe/6851252', 0),
(75, '열무물김치', 20, 'https://www.10000recipe.com/recipe/6852334', 1),
(76, '오이소박이', 40, 'https://www.10000recipe.com/recipe/6896175', 0),
(77, '총각김치', 30, 'https://www.10000recipe.com/recipe/913370', 0),
(78, '파김치', 30, 'https://www.10000recipe.com/recipe/6868260', 0),
(79, '가자미조림', 130, 'https://www.10000recipe.com/recipe/6873605', 0),
(80, '가지볶음', 50, 'https://www.10000recipe.com/recipe/6917883', 0),
(81, '가지조림', 50, 'https://www.10000recipe.com/recipe/6980531', 0),
(82, '갈치조림', 150, 'https://www.10000recipe.com/recipe/6830820', 0),
(83, '감자고구마볶음', 80, 'https://www.10000recipe.com/recipe/6887312', 0),
(84, '감자조림', 80, 'https://www.10000recipe.com/recipe/6829975', 0),
(85, '감자채볶음', 110, 'https://www.10000recipe.com/recipe/4007561', 1),
(86, '고구마닭조림', 150, 'https://www.10000recipe.com/recipe/6969089', 0),
(87, '고구마줄기볶음', 60, 'https://www.10000recipe.com/recipe/6853836', 0),
(88, '고등어무조림', 180, 'https://www.10000recipe.com/recipe/3568149', 0),
(89, '고등어조림', 90, 'https://www.10000recipe.com/recipe/6865888', 0),
(90, '김치야채볶음', 120, NULL, 0),
(91, '깻잎조림', 70, 'https://www.10000recipe.com/recipe/6841411', 0),
(92, '꼬막볶음', 80, 'https://www.10000recipe.com/recipe/585127', 0),
(93, '꽁치조림', 150, 'https://www.10000recipe.com/recipe/6829989', 0),
(94, '낙지볶음', 130, NULL, 0),
(95, '느타리버섯볶음', 110, 'https://www.10000recipe.com/recipe/6920521', 1),
(96, '달걀조림', 70, 'https://www.10000recipe.com/recipe/6894490', 1),
(97, '닭조림', 600, 'https://www.10000recipe.com/recipe/6836808', 0),
(98, '당근야채볶음', 150, NULL, 0),
(99, '대구살전조림', 190, NULL, 0),
(100, '도미조림', 120, 'https://www.10000recipe.com/recipe/6862322', 0),
(101, '동태조림', 120, 'https://www.10000recipe.com/recipe/6863395', 0),
(102, '두부김치볶음', 100, 'https://www.10000recipe.com/recipe/6859913', 0),
(103, '두부조림', 160, 'https://www.10000recipe.com/recipe/6906655', 0),
(104, '메추리알조림', 60, 'https://www.10000recipe.com/recipe/6916408', 0),
(105, '모듬버섯볶음', 110, 'https://www.10000recipe.com/recipe/6944758', 0),
(106, '무조림', 50, 'https://www.10000recipe.com/recipe/6895723', 0),
(107, '문어조림', 40, 'https://www.10000recipe.com/recipe/6695262', 0),
(108, '미트볼조림', 180, 'https://www.10000recipe.com/recipe/1973163', 0),
(109, '밤완자조림', 100, 'https://www.10000recipe.com/recipe/6885359', 0),
(110, '배추조갯살볶음', 100, NULL, 0),
(111, '병어감자조림', 150, 'https://www.10000recipe.com/recipe/6850893', 0),
(112, '병어강정', 160, NULL, 0),
(113, '삼치조림', 180, 'https://www.10000recipe.com/recipe/6854931', 0),
(114, '새우버섯볶음', 130, 'https://www.10000recipe.com/recipe/6983133', 0),
(115, '생선묵조림', 70, NULL, 0),
(116, '소시지야채볶음', 130, 'https://www.10000recipe.com/recipe/6846312', 0),
(117, '소고기달걀장조림', 200, 'https://www.10000recipe.com/recipe/6863661', 0),
(118, '소고기장조림', 100, 'https://www.10000recipe.com/recipe/6886559', 0),
(119, '쑥모듬버섯볶음', 110, NULL, 0),
(120, '알감자조림', 110, 'https://www.10000recipe.com/recipe/6840277', 0),
(121, '양파장아찌', 40, 'https://www.10000recipe.com/recipe/6871582', 0),
(122, '어묵고추장조림', 160, 'https://www.10000recipe.com/recipe/6833519', 0),
(123, '어묵김조림', 210, NULL, 0),
(124, '연근조림', 60, 'https://www.10000recipe.com/recipe/6840027', 0),
(125, '오징어볶음', 170, 'https://www.10000recipe.com/recipe/6903507', 0),
(126, '오징어채조림', 230, 'https://www.10000recipe.com/recipe/1259438', 0),
(127, '우엉조림', 60, 'https://www.10000recipe.com/recipe/6901508', 0),
(128, '전갱이조림', 150, 'https://www.10000recipe.com/recipe/6958426', 0),
(129, '전복초', 80, 'https://www.10000recipe.com/recipe/6867275', 0),
(130, '죽순볶음', 50, 'https://www.10000recipe.com/recipe/6773285', 0),
(131, '쭈꾸미볶음', 100, 'https://www.10000recipe.com/recipe/6877680', 0),
(132, '청어무조림', 250, NULL, 0),
(133, '토란방조림', 160, NULL, 0),
(134, '토란조림', 100, 'https://www.10000recipe.com/recipe/6896330', 0),
(135, '팽이버섯볶음', 90, 'https://www.10000recipe.com/recipe/6919875', 0),
(136, '표고버섯볶음', 80, 'https://www.10000recipe.com/recipe/6868455', 0),
(137, '풋고추조림', 80, 'https://www.10000recipe.com/recipe/6966630', 0),
(138, '피망고기볶음', 250, NULL, 1),
(139, '호박마늘쫑볶음', 110, NULL, 0),
(140, '호박버섯볶음', 90, 'https://www.10000recipe.com/recipe/6843961', 0),
(141, '홍합조림(초)', 200, 'https://www.10000recipe.com/recipe/6329621', 0),
(142, '가자미구이', 110, 'https://www.10000recipe.com/recipe/6873400', 0),
(143, '가자미양념구이', 170, 'https://www.10000recipe.com/recipe/4220523', 0),
(144, '가지양념구이', 160, 'https://www.10000recipe.com/recipe/6980365', 0),
(145, '갈비구이', 220, 'https://www.10000recipe.com/recipe/6868654', 0),
(146, '갈치구이', 130, 'https://www.10000recipe.com/recipe/6841652', 0),
(147, '감자버터구이', 150, 'https://www.10000recipe.com/recipe/6859800', 0),
(148, '고구마버터구이', 330, 'https://www.10000recipe.com/recipe/6860840', 0),
(149, '고등어양념구이', 250, 'https://www.10000recipe.com/recipe/825365', 0),
(150, '굴꼬치구이', 80, 'https://www.10000recipe.com/recipe/6882868', 0),
(151, '굴비구이', 90, 'https://www.10000recipe.com/recipe/6287546', 0),
(152, '김구이', 10, 'https://www.10000recipe.com/recipe/6972288', 0),
(153, '꽁치구이', 160, 'https://www.10000recipe.com/recipe/6892447', 0),
(154, '달걀시금치말이', 140, 'https://www.10000recipe.com/recipe/6892209', 0),
(155, '닭구이', 370, 'https://www.10000recipe.com/recipe/1908114', 0),
(156, '대합구이', 300, NULL, 0),
(157, '더덕구이', 170, 'https://www.10000recipe.com/recipe/6830564', 0),
(158, '도미구이', 90, 'https://www.10000recipe.com/recipe/6848910', 0),
(159, '돼지불고기', 250, 'https://www.10000recipe.com/recipe/6869163', 0),
(160, '두부구이', 170, 'https://www.10000recipe.com/recipe/6922254', 0),
(161, '메기양념구이', 240, NULL, 0),
(162, '민어양념구이', 180, 'https://www.10000recipe.com/recipe/6899640', 0),
(163, '뱅어포구이', 100, 'https://www.10000recipe.com/recipe/6903619', 0),
(164, '병어양념구이', 180, NULL, 0),
(165, '삼치구이', 130, 'https://www.10000recipe.com/recipe/6846713', 0),
(166, '삼치엿장구이', 200, NULL, 0),
(167, '새우꼬치구이', 50, 'https://www.10000recipe.com/recipe/6829383', 0),
(168, '송이버섯구이', 80, 'https://www.10000recipe.com/recipe/6561166', 0),
(169, '연어구이', 180, 'https://www.10000recipe.com/recipe/6862686', 0),
(170, '연어버터구이', 230, 'https://www.10000recipe.com/recipe/6959090', 1),
(171, '오징어불고기', 170, 'https://www.10000recipe.com/recipe/6968386', 0),
(172, '우엉양념구이', 140, NULL, 0),
(173, '이면수구이', 160, 'https://www.10000recipe.com/recipe/6862276', 0),
(174, '전갱이소금구이', 110, NULL, 0),
(175, '제육구이', 440, 'https://www.10000recipe.com/recipe/6899842', 0),
(176, '조기구이', 90, 'https://www.10000recipe.com/recipe/6874057', 0),
(177, '주꾸미구이', 100, 'https://www.10000recipe.com/recipe/6877680', 0),
(178, '청어소금구이', 200, NULL, 0),
(179, '청어양념구이', 250, NULL, 0),
(180, '카레삼치구이', 200, 'https://www.10000recipe.com/recipe/6839667', 0),
(181, '코다리고추장구이', 80, 'https://www.10000recipe.com/recipe/6847158', 0),
(182, '가자미찜', 400, 'https://www.10000recipe.com/recipe/6907337', 0),
(183, '깻잎두부양념찜', 80, NULL, 0),
(184, '꼬막양념찜', 130, 'https://www.10000recipe.com/recipe/6900995', 0),
(185, '꽃게찜', 190, 'https://www.10000recipe.com/recipe/6869426', 0),
(186, '달걀찜', 100, 'https://www.10000recipe.com/recipe/6872350', 0),
(187, '닭찜', 290, 'https://www.10000recipe.com/recipe/6893649', 0),
(188, '대하찜', 110, 'https://www.10000recipe.com/recipe/6858067', 0),
(189, '대합찜', 110, NULL, 0),
(190, '도미찜', 150, 'https://www.10000recipe.com/recipe/6867222', 0),
(191, '돼지갈비찜', 230, 'https://www.10000recipe.com/recipe/6910133', 0),
(192, '두부쑥갓말이찜', 260, NULL, 0),
(193, '두부찜', 100, 'https://www.10000recipe.com/recipe/6862968', 0),
(194, '떡 찜', 370, NULL, 0),
(195, '메기찜', 190, NULL, 0),
(196, '명란고추찜', 100, NULL, 0),
(197, '북어찜', 170, 'https://www.10000recipe.com/recipe/6862332', 0),
(198, '새우찜', 120, 'https://www.10000recipe.com/recipe/2382597', 0),
(199, '소고기대추찜', 180, NULL, 0),
(200, '아구찜', 500, 'https://www.10000recipe.com/recipe/6655115', 0),
(201, '자반고등어찜', 220, 'https://www.10000recipe.com/recipe/6169088', 0),
(202, '전복찜', 180, 'https://www.10000recipe.com/recipe/4941713', 1),
(203, '죽순우찜', 210, NULL, 0),
(204, '코다리불고기찜', 250, 'https://www.10000recipe.com/recipe/6948133', 0),
(205, '토란사태찜', 200, NULL, 0),
(206, '풋고추찜', 50, NULL, 0),
(207, '홍어찜', 290, 'https://www.10000recipe.com/recipe/6883129', 0),
(208, '가지나물', 55, 'https://www.10000recipe.com/recipe/6917781', 0),
(209, '고구마줄기무침', 67, 'https://www.10000recipe.com/recipe/6859956', 0),
(210, '고추잎나물', 60, 'https://www.10000recipe.com/recipe/6851233', 0),
(211, '골뱅이무침', 98, 'https://www.10000recipe.com/recipe/6830356', 0),
(212, '근대나물', 45, 'https://www.10000recipe.com/recipe/6960165', 0),
(213, '깻잎나물', 50, 'https://www.10000recipe.com/recipe/3891868', 1),
(214, '냉이나물', 143, 'https://www.10000recipe.com/recipe/6905185', 0),
(215, '노각생채', 59, 'https://www.10000recipe.com/recipe/6835845', 0),
(216, '달래생채', 69, 'https://www.10000recipe.com/recipe/6903648', 0),
(217, '더덕생채', 51, 'https://www.10000recipe.com/recipe/6737969', 0),
(218, '도라지나물', 97, 'https://www.10000recipe.com/recipe/6837331', 0),
(219, '도라지생채', 89, 'https://www.10000recipe.com/recipe/6884482', 0),
(220, '두릅나물', 41, 'https://www.10000recipe.com/recipe/6847075', 0),
(221, '무생채', 49, 'https://www.10000recipe.com/recipe/6893285', 0),
(222, '무나물', 146, 'https://www.10000recipe.com/recipe/6959584', 0),
(223, '미역오이초무침', 21, 'https://www.10000recipe.com/recipe/4387218', 0),
(224, '숙주나물', 23, 'https://www.10000recipe.com/recipe/6878386', 0),
(225, '시금치나물', 44, 'https://www.10000recipe.com/recipe/5010998', 0),
(226, '시래기나물', 48, 'https://www.10000recipe.com/recipe/6869606', 0),
(227, '쑥갓나물', 32, 'https://www.10000recipe.com/recipe/373366', 0),
(228, '도라지오이무침', 56, 'https://www.10000recipe.com/recipe/6888787', 0),
(229, '오이생채', 46, 'https://www.10000recipe.com/recipe/6851097', 1),
(230, '오징어무침', 83, 'https://www.10000recipe.com/recipe/6876440', 0),
(231, '쥐포무침', 129, 'https://www.10000recipe.com/recipe/6902123', 0),
(232, '청포묵김무침', 109, 'https://www.10000recipe.com/recipe/6853470', 0),
(233, '취나물무침', 38, 'https://www.10000recipe.com/recipe/6874976', 0),
(234, '토란대무침', 48, NULL, 0),
(235, '파래무침', 35, 'https://www.10000recipe.com/recipe/6923378', 0),
(236, '호박나물', 40, 'https://www.10000recipe.com/recipe/6852488', 0),
(237, '미나리 나물', 40, 'https://www.10000recipe.com/recipe/2342071', 0),
(238, '애호박나물', 52, 'https://www.10000recipe.com/recipe/6888112', 0),
(239, '무나물', 30, 'https://www.10000recipe.com/recipe/6862214', 0),
(240, '감자야채볶음', 92, 'https://www.10000recipe.com/recipe/6831399', 0),
(241, '감자햄볶음', 155, 'https://www.10000recipe.com/recipe/6838234', 0),
(242, '건오징어볶음', 206, 'https://www.10000recipe.com/recipe/6910270', 0),
(243, '고사리볶음', 56, 'https://www.10000recipe.com/recipe/6944555', 0),
(244, '근대볶음', 53, NULL, 0),
(245, '김치볶음', 132, 'https://www.10000recipe.com/recipe/6908894', 0),
(246, '낙지볶음', 137, 'https://www.10000recipe.com/recipe/6869245', 0),
(247, '도라지볶음', 98, 'https://www.10000recipe.com/recipe/6906894', 0),
(248, '돼지고기고추장볶음', 216, 'https://www.10000recipe.com/recipe/4994739', 0),
(249, '마늘쫑볶음', 84, 'https://www.10000recipe.com/recipe/6895838', 0),
(250, '멸치볶음', 83, 'https://www.10000recipe.com/recipe/6881457', 0),
(251, '물오징어볶음', 202, 'https://www.10000recipe.com/recipe/6892538', 0),
(252, '뱅어포볶음', 204, 'https://www.10000recipe.com/recipe/6846019', 0),
(253, '버섯줄기볶음', 111, NULL, 0),
(254, '소세지야채볶음', 459, 'https://www.10000recipe.com/recipe/6890483', 0),
(255, '순대볶음', 197, 'https://www.10000recipe.com/recipe/6858086', 0),
(256, '애호박새우볶음', 39, 'https://www.10000recipe.com/recipe/6851998', 0),
(257, '어묵볶음', 128, 'https://www.10000recipe.com/recipe/5407249', 0),
(258, '오징어채볶음', 125, 'https://www.10000recipe.com/recipe/6111524', 0),
(259, '우엉볶음', 120, 'https://www.10000recipe.com/recipe/6864056', 0),
(260, '잔멸치볶음', 205, 'https://www.10000recipe.com/recipe/6839837', 0),
(261, '제육볶음', 262, 'https://www.10000recipe.com/recipe/6845428', 0),
(262, '쥐포볶음', 154, 'https://www.10000recipe.com/recipe/6838322', 0),
(263, '풋고추멸치볶음', 134, 'https://www.10000recipe.com/recipe/6875568', 0),
(264, '호박볶음', 15, 'https://www.10000recipe.com/recipe/6857611', 0),
(265, '가자미튀김', 190, 'https://www.10000recipe.com/recipe/4470291', 0),
(266, '갈치튀김', 322, 'https://www.10000recipe.com/recipe/6960517', 0),
(267, '감자튀김', 170, 'https://www.10000recipe.com/recipe/6851435', 0),
(268, '고구마채튀김', 219, 'https://www.10000recipe.com/recipe/4381254', 0),
(269, '고구마튀김', 325, 'https://www.10000recipe.com/recipe/6838891', 0),
(270, '고추튀김', 125, 'https://www.10000recipe.com/recipe/6843222', 0),
(271, '병어튀김', 205, NULL, 0),
(272, '새우튀김', 361, 'https://www.10000recipe.com/recipe/6867572', 0),
(273, '찐감자', 109, 'https://www.10000recipe.com/recipe/4064451', 0),
(274, '찐고구마', 250, 'https://www.10000recipe.com/recipe/6923746', 0),
(275, '채소튀김', 299, 'https://www.10000recipe.com/recipe/6897794', 0),
(276, '오이', 19, NULL, 0),
(277, '상추', 20, NULL, 0),
(278, '생당근', 33, NULL, 0),
(279, '데친 브로콜리', 43, 'https://www.10000recipe.com/recipe/6909454', 0),
(280, '양배추', 29, NULL, 0),
(281, '오이부추무침', 47, NULL, 0),
(282, '어묵조림', 114, 'https://www.10000recipe.com/recipe/6927491', 0),
(283, '잡채', 150, 'https://www.10000recipe.com/recipe/6879533', 0),
(284, '간장게장', 379, 'https://www.10000recipe.com/recipe/6890182', 0),
(285, '불고기', 471, 'https://www.10000recipe.com/recipe/6867715', 0),
(286, '오이피클', 48, 'https://www.10000recipe.com/recipe/6853020', 0),
(287, '도토리묵무침', 120, 'https://www.10000recipe.com/recipe/6868921', 0),
(288, '콩나물무침', 77, 'https://www.10000recipe.com/recipe/6895383', 0),
(289, '닭볶음탕', 370, 'https://www.10000recipe.com/recipe/6876357', 0),
(290, '고구마맛탕', 500, 'https://www.10000recipe.com/recipe/6885349', 0),
(291, '두부강정', 361, 'https://www.10000recipe.com/recipe/6872334', 0),
(292, '칠리새우', 240, 'https://www.10000recipe.com/recipe/6879972', 0),
(293, '꽈리고추조림', 29, 'https://www.10000recipe.com/recipe/6840310', 0),
(294, '쑥갓두부무침', 83, 'https://www.10000recipe.com/recipe/6911174', 0),
(295, '미역줄기볶음', 66, 'https://www.10000recipe.com/recipe/6876544', 0),
(296, '닭갈비', 600, 'https://www.10000recipe.com/recipe/6928209', 0),
(297, '매운팽이버섯조림', 60, 'https://www.10000recipe.com/recipe/6927971', 0),
(298, '간장두부조림', 85, 'https://www.10000recipe.com/recipe/6922919', 0),
(299, '찹스테이크', 498, 'https://www.10000recipe.com/recipe/6907592', 1),
(300, '계란장', 150, 'https://www.10000recipe.com/recipe/6891591', 0),
(301, '마파두부', 320, 'https://www.10000recipe.com/recipe/6881454', 0),
(302, '오삼불고기', 663, 'https://www.10000recipe.com/recipe/6854567', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `id_num` int(11) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`id_num`, `writer`, `title`, `description`, `createdAt`, `views`) VALUES
(1, '관리자', '첫 글입니다.', '공지본문입니다.', '2022-10-11', 2),
(2, '테스트관리자', '테스트 공지', '테스트내용입니다.', '2022-10-11', 2),
(3, '관리자', '두번째 테스트 글입니다.', '두번째 테스트 글 정렬', '2022-10-11', 0),
(4, 'testman', '테스트 글 여러개', '테스트 글 여러개', '2022-10-11', 3),
(5, 'testman', '테스트 글 여러개', '테스트 글 여러개', '2022-10-11', 1),
(6, 'testman', '테스트 글 여러개', '테스트 글 여러개', '2022-10-11', 0),
(7, 'testman', '테스트 글 여러개', '테스트 글 여러개', '2022-10-11', 1),
(8, 'testman', '테스트 글 여러개', '테스트 글 여러개', '2022-10-11', 2),
(9, 'testman', '테스트 글 마지막?', '테스트 글 여러개', '2022-10-11', 20),
(10, '개발자', '글 수정', '영상 보내드립니다. 테스트용으로 글 올려보겠습니다. 수정', '2022-10-21', 4);

-- --------------------------------------------------------

--
-- 테이블 구조 `recommend`
--

CREATE TABLE `recommend` (
  `id_num` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `recommend`
--

INSERT INTO `recommend` (`id_num`, `user_id`, `a`, `b`, `c`) VALUES
(2, 6, 202, 85, 75),
(3, 6, 299, 213, 69);

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `id_num` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `recommend` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`recommend`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`id_num`, `name`, `email`, `password`, `contact`, `age`, `height`, `weight`, `role`, `recommend`) VALUES
(6, '테스트맨', 'testman@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 'man', 20, 180, 83, 1, NULL),
(7, '관리자', 'admin@admin', '81dc9bdb52d04dc20036dbd8313ed055', 'woman', 20, NULL, NULL, 2, NULL);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id_num`);

--
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id_num`);

--
-- 테이블의 인덱스 `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`id_num`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `dish`
--
ALTER TABLE `dish`
  MODIFY `id_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `id_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `recommend`
--
ALTER TABLE `recommend`
  MODIFY `id_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
