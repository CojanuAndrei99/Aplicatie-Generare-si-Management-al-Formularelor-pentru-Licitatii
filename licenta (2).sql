-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 10:06 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `licenta`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firmas`
--

CREATE TABLE `firmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nume_firma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(11) NOT NULL,
  `nume_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa_firma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_fiscal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numar_inregistrare` int(11) NOT NULL,
  `data_inregistrare` date NOT NULL DEFAULT current_timestamp(),
  `incadrare_legala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cf_1` double NOT NULL,
  `cf_2` double NOT NULL,
  `cf_3` double NOT NULL,
  `email_firma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `firmas`
--

INSERT INTO `firmas` (`id`, `nume_firma`, `id_user`, `nume_admin`, `adresa_firma`, `telefon`, `cod_fiscal`, `numar_inregistrare`, `data_inregistrare`, `incadrare_legala`, `cf_1`, `cf_2`, `cf_3`, `email_firma`, `email_verified_at`, `verification_code`, `is_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Exemplu de Firma pentru Aplicatie S.R.L.', 1, 'Cojanu Andrei', 'Sediul Bucuresti, Strada Stefan cel mare, Nr.9, Sector 2, Bucuresti, Romania', '0879283265', '12341', 1234, '2020-05-21', 'srl', 12, 32, 45, 'email1@g.com', NULL, NULL, 0, NULL, '2021-05-26 17:12:40', '2021-05-26 17:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `formulars`
--

CREATE TABLE `formulars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_firma` int(11) NOT NULL,
  `id_licitatie` int(11) NOT NULL,
  `formular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `licitaties`
--

CREATE TABLE `licitaties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_firma` int(11) NOT NULL,
  `nume_personalizat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fisa_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beneficiar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numar_referinta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_fiscal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localitate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_nuts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persoana_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titlu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tip_contract` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriere_succinta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valoare_totala_ftva` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moneda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informatii_suplimentare` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nr_loturi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licitaties`
--

INSERT INTO `licitaties` (`id`, `id_user`, `id_firma`, `nume_personalizat`, `fisa_date`, `file_path`, `beneficiar`, `numar_referinta`, `cod_fiscal`, `adresa`, `localitate`, `cod_postal`, `tara`, `cod_nuts`, `email`, `telefon`, `fax`, `persoana_contact`, `titlu`, `tip_contract`, `descriere_succinta`, `valoare_totala_ftva`, `moneda`, `informatii_suplimentare`, `nr_loturi`, `created_at`, `updated_at`) VALUES
(45, 1, 4, 'nume1', '1624461690_FisaDate_DF1098538.pdf', '../storage/app/public/uploads/1624461690_FisaDate_DF1098538.pdf', 'Ministerul Fondurilor Europene', '', '38918433', 'Strada: Mendeleev D.I., nr. 36-38', 'Bucuresti', '010366', 'Romania', 'RO321 Bucuresti', 'achizitii@mfe.gov.ro', '40  372838800', '40  372838800', 'Constantin Saragea', 'Achizitionarea de Echipamente IT si software licentiat pentru desfasurarea activitatii in cadrul DGPECU', 'FurnizareCumparare', 'Obiectivul contractului il constituie: achizitia de echipamente IT si software licentiat in vederea asigurarii conditiilor tehnice\r\n\r\nnecesare pentru indeplinirea activitatilor specifice la nivelul DGPECU.\r\n\r\nSe  are  in  vedere  cresterea  nivelului  de  securitate  si  performanta,  asigurarea  unei  solutii  moderne  si  flexibile  care  sa  raspunda\r\n\r\ncerintelor institutiei de sustinere a activitatii curente a organizatiei, de crestere a gradului de eficienta, performanta si securitate, care\r\n\r\nse va realiza prin inlocuirea statiilor de lucru/a sistemelor desktop.\r\n\r\nEste necesara inlocuirea statiilor de lucru pentru a putea sustine cele mai noi cerinte ale utilizatorilor, precum si pentru a asigura\r\n\r\nsecuritatea sistemului informatic al Ministerului Fondurilor Europene.\r\n\r\nCerintele tehnice solicitate prin Caietul de sarcini sunt minim necesare, luand in calcul asigurarea unei expandabilitati suficiente si a\r\n\r\nposibilitatii actualizarii sistemelor in concordanta cu planurile pe termen lung.\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 23.10.2020 08:20	Pagina 1\r\n\r\nCerintele tehnice solicitate prin prezentul Caiet de sarcini sunt minim necesare, luand in calcul asigurarea unei bune derulari a\r\n\r\nproiectului.\r\n\r\nContractul de achizitie publica \"Echipamente IT si software licentiat pentru desfasurarea activitatii in cadrul DGPECU\" are ca scop\r\n\r\nfurnizarea produselor la sediul autoritatii contractante.\r\n\r\nNumar zile pana la care se pot solicita clarificari inainte de data limita de depunere a ofertelor/candidaturilor = 20 zile.\r\n\r\nAutoritatea contractanta va raspunde tuturor clarificarilor in a 11-a zi inainte de data limita de depunere a ofertelor.', '1451030', 'RON', 'Pentru indeplinirea cerintelor de calificare, operatorii economici vor depune in SEAP, DUAE, urmand ca autoritatea contractanta\r\n\r\nsa solicite documentele de calificare ofertantului clasat pe primul loc in\r\n\r\nurma aplicarii criteriului de atribuire, la finalizarea evaluarii ofertelor.\r\n\r\nIMPORTANT:\r\n\r\nOfertantii au obligatia de a respecta prevederile Regulamentului nr. 679 din 27 aprilie 2016 privind protectia persoanelor fizice in ceea ce\r\n\r\npriveste prelucrarea datelor cu caracter personal si privind libera circulatie a acestor date (Regulamentul general privind protectia datelor),\r\n\r\nprecum si prevederile Directivei 2002/58/CE privind prelucrarea datelor personale si protejarea confidentialitatii in sectorul comunicatiilor\r\n\r\npublice (Directiva asupra confidentialitatii si comunicatiilor electronice), transpusa in legislatia nationala prin Legea nr. 506/2004 privind\r\n\r\nprelucrarea datelor cu caracter personal si protectia vietii private in sectorul comunicatiilor electronice, cu modificarile si completarile\r\n\r\nulterioare. In acest sens, ofertantii, prin depunerea ofertelor consimt atat asupra propriului acord de prelucrare a datelor cu caracter\r\n\r\npersonal, cat si asupra permisiunii de a furniza datele personale ale partenerilor in vederea prelucrarii atat in aplicatiile electronice\r\n\r\nSMIS/MySMIS, cat si in toate fazele de evaluare/contractare/ implementare/sustenabilitate a proiectului, cu respectarea dispozitiilor legale\r\n\r\nmentionate anterior.\r\n\r\nAvand in vedere prevederile Ordonantei de Urgenta nr. 114/09.07.2020, privind modificarea si completarea unor acte normative cu\r\n\r\nimpact  in  domeniul  achizitiilor  publice,  prin  care  articolul  214,  alineatul  (3)  din  Legea  nr.  98/2016,  a  fost  modificat  si  are  urmatorul\r\n\r\ncontinut:\r\n\r\n\"(3) Autoritatea contractanta intocmeste raportul procedurii intr-un termen care sa nu depaseasca\r\n\r\na) 60 zile lucratoare pentru procedurile prevazute la art. 68 alin. (1) lit. a), b), e), g) si h);\",\r\n\r\nastfel Autoritatea Contractanta, precizeaza ca, termenele la raspunsurile privind eventualele solicitari de clarificari, vor fi de regula, de o (1)\r\n\r\nzi lucratoare pentru transmiterea/incarcarea raspunsurilor prin intermediul SEAP, in functie de volumul si complexitatea clarificarilor si\r\n\r\ncompletarilor formale sau de confirmare necesare pentru evaluarea fiecarei solicitari de participare/oferte in conformitate cu prevederile\r\n\r\nart. 134 alin. (1) si alin. (3) din H.G. nr. 395/2016, cu modificarile si completarile ulterioare:\r\n\r\n(1) Comisia de evaluare are obligatia de a stabili care sunt clarificarile si completarile formale sau de confirmare, necesare pentru\r\n\r\nevaluarea fiecarei solicitari de participare/oferte, precum si perioada de timp acordata pentru transmiterea acestora, termenul-limita\r\n\r\nneputand fi stabilit decat la nivel de zile lucratoare, fara a fi precizata o ora anume in cadrul acestuia........\r\n\r\n(3) Comisia de evaluare va stabili termenul-limita in functie de volumul si complexitatea clarificarilor si completarilor formale sau de\r\n\r\nconfirmare necesare pentru evaluarea fiecarei solicitari de participare/oferte. Termenul astfel stabilit va fi, de regula, de minimum 1 zile\r\n\r\nlucratoare.\"', 2, '2021-06-23 12:21:30', '2021-06-23 12:21:30'),
(54, 1, 4, 'random name 2', '1625492716_FisaDate_DF1053859.pdf', '../storage/app/public/uploads/1625492716_FisaDate_DF1053859.pdf', 'CENTRUL NATIONAL DE CARTOGRAFIE', '14057015_2019_PAAPD1076757', 'RO14057015', 'Strada: Bd. Expozitiei, nr. 1A', 'Bucuresti', '012101', 'Romania', 'RO321 Bucuresti', 'bmap@cngcft.ro', '40 0212241621', '40 0212241996', 'Mariana Dumitrache', 'Furnizare echipamente tipografice', 'FurnizareCumparare', 'Furnizare echipamente tipografice loturile 1, 2 si 3:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat\r\n\r\nNumar zile pana la care se pot solicita clarificari inainte de data limita de depunere a ofertelor/candidaturilor: 20zile.\r\n\r\nAutoritatea contractanta va raspunde in mod clar si complet tuturor solicitarilor de clarificari sau informatiilor suplimentare in a 11-a\r\n\r\nzi inainte de data limita de depunere a ofertelor.\r\n\r\n \r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 1', '2287392', 'RON', '1. Durata contractului pentru furnizarea produselor: 4 luni incepand de la data semnarii contractului. Constituirea garantiei de\r\n\r\nbuna executie se face in maxim 5 zile lucratoare de la semnarea contractului de catre ambele parti.\r\n\r\n2. Termenul de livrare: maxim 60 zile de la data intrarii in vigoare a contractului.\r\n\r\n3. Documentele sunt semnate electronic in conformitate cu prevederile art. 22 alin (2) din HG 395/2016. \"Pentru deschiderea acestor\r\n\r\nfisiere utilizati aplicatia DigiSignOne de la adresa https://www.digisign.ro/utile/download\".\r\n\r\n4. Inainte de a se adresa Consiliului sau instantei de judecata competente, persoana care se considera vatamata are obligatia sa notifice\r\n\r\nautoritatea contractanta cu privire la solicitarea de remediere, in tot sau in parte, a pretinsei incalcari a legislatiei privind achizitiile publice\r\n\r\nsau concesiunile, in termen de 5 zile, incepand cu ziua urmatoare luarii la cunostinta despre actul autoritatii contractante considerat\r\n\r\nnelegal. In termen de 3 zile, calculat incepand cu ziua urmatoare primirii notificarii prealabile, autoritatea contractanta transmite un\r\n\r\nraspuns  prin  care  comunica  daca  urmeaza  sau  nu  sa  adopte  masuri  de  remediere  a  pretinsei  incalcari.  In  cazul  in  care  autoritatea\r\n\r\ncontractanta transmite un raspuns in sensul ca urmeaza sa adopte masuri de remediere, aceasta are la dispozitie un termen de 7 zile\r\n\r\npentru implementarea efectiva a acestora.\r\n\r\n5. Ofertantii pot depune oferte pentru unul sau mai multe loturi.\r\n\r\nPlata se va efectua in termen de maximum 45 de zile de la semnarea de catre Autoritatea contractanta a Procesului verbal de receptie si\r\n\r\npunere in functiune fara observatii. Pentru prezentul contract de furnizare produse, termenul contractual de plata este prevazut la 45 de\r\n\r\nzile, avand in vedere durata procesului de verificare al documentelor inainte de realizarea platilor precum si accesul la fondurile necesare\r\n\r\nefectuarii platilor, in conformitate cu art. 7, alin. (1) din Legea nr. 72/2013 cu modificarile si completarile ulterioare.\r\n\r\nNOTA: Autoritatea Contractanta recomanda oricarui operator economic, interesat de procedura de achizitie aflata in desfasurare, sa\r\n\r\ntransmita solicitarile de clarificari/notificari/ contestatii in legatura cu documentatia de atribuire prin intermediul SEAP, pana la data limita\r\n\r\nde  depunere  a  ofertelor.  Raspunsurile  la  acestea  vor  fi  publicate  in  SEAP  la  sectiunea  \"Documentatie,  clarificari,  decizii\"  din  cadrul\r\n\r\nanuntului de participare in termenele prevazute la pct. I.3,si II.1.4.', 3, '2021-07-05 10:45:16', '2021-07-05 10:45:16'),
(55, 1, 4, 'random name 3', '1625492737_FisaDate_DF1053859.pdf', '../storage/app/public/uploads/1625492737_FisaDate_DF1053859.pdf', 'CENTRUL NATIONAL DE CARTOGRAFIE2', '14057015_2019_PAAPD1076757', 'RO14057015', 'Strada: Bd. Expozitiei, nr. 1A', 'Bucuresti', '012101', 'Romania', 'RO321 Bucuresti', 'bmap@cngcft.ro', '40 0212241621', '40 0212241996', 'Mariana Dumitrache', 'Furnizare echipamente tipografice', 'FurnizareCumparare', 'Furnizare echipamente tipografice loturile 1, 2 si 3:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat\r\n\r\nNumar zile pana la care se pot solicita clarificari inainte de data limita de depunere a ofertelor/candidaturilor: 20zile.\r\n\r\nAutoritatea contractanta va raspunde in mod clar si complet tuturor solicitarilor de clarificari sau informatiilor suplimentare in a 11-a\r\n\r\nzi inainte de data limita de depunere a ofertelor.\r\n\r\n \r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 1', '2287392', 'RON', '1. Durata contractului pentru furnizarea produselor: 4 luni incepand de la data semnarii contractului. Constituirea garantiei de\r\n\r\nbuna executie se face in maxim 5 zile lucratoare de la semnarea contractului de catre ambele parti.\r\n\r\n2. Termenul de livrare: maxim 60 zile de la data intrarii in vigoare a contractului.\r\n\r\n3. Documentele sunt semnate electronic in conformitate cu prevederile art. 22 alin (2) din HG 395/2016. \"Pentru deschiderea acestor\r\n\r\nfisiere utilizati aplicatia DigiSignOne de la adresa https://www.digisign.ro/utile/download\".\r\n\r\n4. Inainte de a se adresa Consiliului sau instantei de judecata competente, persoana care se considera vatamata are obligatia sa notifice\r\n\r\nautoritatea contractanta cu privire la solicitarea de remediere, in tot sau in parte, a pretinsei incalcari a legislatiei privind achizitiile publice\r\n\r\nsau concesiunile, in termen de 5 zile, incepand cu ziua urmatoare luarii la cunostinta despre actul autoritatii contractante considerat\r\n\r\nnelegal. In termen de 3 zile, calculat incepand cu ziua urmatoare primirii notificarii prealabile, autoritatea contractanta transmite un\r\n\r\nraspuns  prin  care  comunica  daca  urmeaza  sau  nu  sa  adopte  masuri  de  remediere  a  pretinsei  incalcari.  In  cazul  in  care  autoritatea\r\n\r\ncontractanta transmite un raspuns in sensul ca urmeaza sa adopte masuri de remediere, aceasta are la dispozitie un termen de 7 zile\r\n\r\npentru implementarea efectiva a acestora.\r\n\r\n5. Ofertantii pot depune oferte pentru unul sau mai multe loturi.\r\n\r\nPlata se va efectua in termen de maximum 45 de zile de la semnarea de catre Autoritatea contractanta a Procesului verbal de receptie si\r\n\r\npunere in functiune fara observatii. Pentru prezentul contract de furnizare produse, termenul contractual de plata este prevazut la 45 de\r\n\r\nzile, avand in vedere durata procesului de verificare al documentelor inainte de realizarea platilor precum si accesul la fondurile necesare\r\n\r\nefectuarii platilor, in conformitate cu art. 7, alin. (1) din Legea nr. 72/2013 cu modificarile si completarile ulterioare.\r\n\r\nNOTA: Autoritatea Contractanta recomanda oricarui operator economic, interesat de procedura de achizitie aflata in desfasurare, sa\r\n\r\ntransmita solicitarile de clarificari/notificari/ contestatii in legatura cu documentatia de atribuire prin intermediul SEAP, pana la data limita\r\n\r\nde  depunere  a  ofertelor.  Raspunsurile  la  acestea  vor  fi  publicate  in  SEAP  la  sectiunea  \"Documentatie,  clarificari,  decizii\"  din  cadrul\r\n\r\nanuntului de participare in termenele prevazute la pct. I.3,si II.1.4.', 3, '2021-07-05 10:45:37', '2021-07-05 10:45:37'),
(56, 1, 4, 'nume34', '1625492846_FisaDate_DF1053859.pdf', '../storage/app/public/uploads/1625492846_FisaDate_DF1053859.pdf', 'CENTRUL NATIONAL DE CARTOGRAFIE3', '14057015_2019_PAAPD1076757', 'RO14057015', 'Strada: Bd. Expozitiei, nr. 1A', 'Bucuresti', '012101', 'Romania', 'RO321 Bucuresti', 'bmap@cngcft.ro', '40 0212241621', '40 0212241996', 'Mariana Dumitrache', 'Furnizare echipamente tipografice', 'FurnizareCumparare', 'Furnizare echipamente tipografice loturile 1, 2 si 3:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat\r\n\r\nNumar zile pana la care se pot solicita clarificari inainte de data limita de depunere a ofertelor/candidaturilor: 20zile.\r\n\r\nAutoritatea contractanta va raspunde in mod clar si complet tuturor solicitarilor de clarificari sau informatiilor suplimentare in a 11-a\r\n\r\nzi inainte de data limita de depunere a ofertelor.\r\n\r\n \r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 1', '2287392', 'RON', '1. Durata contractului pentru furnizarea produselor: 4 luni incepand de la data semnarii contractului. Constituirea garantiei de\r\n\r\nbuna executie se face in maxim 5 zile lucratoare de la semnarea contractului de catre ambele parti.\r\n\r\n2. Termenul de livrare: maxim 60 zile de la data intrarii in vigoare a contractului.\r\n\r\n3. Documentele sunt semnate electronic in conformitate cu prevederile art. 22 alin (2) din HG 395/2016. \"Pentru deschiderea acestor\r\n\r\nfisiere utilizati aplicatia DigiSignOne de la adresa https://www.digisign.ro/utile/download\".\r\n\r\n4. Inainte de a se adresa Consiliului sau instantei de judecata competente, persoana care se considera vatamata are obligatia sa notifice\r\n\r\nautoritatea contractanta cu privire la solicitarea de remediere, in tot sau in parte, a pretinsei incalcari a legislatiei privind achizitiile publice\r\n\r\nsau concesiunile, in termen de 5 zile, incepand cu ziua urmatoare luarii la cunostinta despre actul autoritatii contractante considerat\r\n\r\nnelegal. In termen de 3 zile, calculat incepand cu ziua urmatoare primirii notificarii prealabile, autoritatea contractanta transmite un\r\n\r\nraspuns  prin  care  comunica  daca  urmeaza  sau  nu  sa  adopte  masuri  de  remediere  a  pretinsei  incalcari.  In  cazul  in  care  autoritatea\r\n\r\ncontractanta transmite un raspuns in sensul ca urmeaza sa adopte masuri de remediere, aceasta are la dispozitie un termen de 7 zile\r\n\r\npentru implementarea efectiva a acestora.\r\n\r\n5. Ofertantii pot depune oferte pentru unul sau mai multe loturi.\r\n\r\nPlata se va efectua in termen de maximum 45 de zile de la semnarea de catre Autoritatea contractanta a Procesului verbal de receptie si\r\n\r\npunere in functiune fara observatii. Pentru prezentul contract de furnizare produse, termenul contractual de plata este prevazut la 45 de\r\n\r\nzile, avand in vedere durata procesului de verificare al documentelor inainte de realizarea platilor precum si accesul la fondurile necesare\r\n\r\nefectuarii platilor, in conformitate cu art. 7, alin. (1) din Legea nr. 72/2013 cu modificarile si completarile ulterioare.\r\n\r\nNOTA: Autoritatea Contractanta recomanda oricarui operator economic, interesat de procedura de achizitie aflata in desfasurare, sa\r\n\r\ntransmita solicitarile de clarificari/notificari/ contestatii in legatura cu documentatia de atribuire prin intermediul SEAP, pana la data limita\r\n\r\nde  depunere  a  ofertelor.  Raspunsurile  la  acestea  vor  fi  publicate  in  SEAP  la  sectiunea  \"Documentatie,  clarificari,  decizii\"  din  cadrul\r\n\r\nanuntului de participare in termenele prevazute la pct. I.3,si II.1.4.', 3, '2021-07-05 10:47:26', '2021-07-05 10:47:26'),
(57, 1, 4, 'nume2', '1625492867_FisaDate_DF1098083.pdf', '../storage/app/public/uploads/1625492867_FisaDate_DF1098083.pdf', 'UNIVERSITATEA PETROL SI GAZE2', '2844790_2020_PAAPD1138883', '2844790', 'Strada: Bulevardul Bucuresti, nr. 39', 'Ploiesti', '100680', 'Romania', 'RO316 Prahova', 'birou_achizitii@upg-ploiesti.ro', '40 244575659/ 40 244573171/242', '40 24457584/ 40 244575312', 'BULEARCA CLAUDIA', 'Echipamente IT', 'FurnizareCumparare', 'Universitatea Petrol Gaze Ploiesti isi propune sa atribuire un contract de achizitie publica pentru furnizarea produselor\r\n\r\n\"ECHIPAMENTE  IT  -grupate  pe  3  loturi,cu  scopul  asigurarii/dotarii    bazei  materiale,  in  vederea  desfasurarii  in  bune  conditii  a\r\n\r\nactivitatilor didatice si de cercetare din cadrul laboratoarelor/departamentelor universitatii. Specificatiile tehnice ale echipamentelor\r\n\r\nIT sunt detaliate in  caietul  de sarcini', '183151.29', 'RON', 'LA  ELABORAREA  OFERTELOR  SE  VA  TINE  CONT  DE  MENTIUNEA  SPECIFICATA  IN  CAIETUL  DE  SARCINI  PENTRU  LOTUl  1:\r\n\r\n\"Conform conditiilor impuse de minister (MEC) valoarea unitara a produselor ofertatecelor fixe produsele ofertate, la categoria mijloacelor\r\n\r\nfixe, respectiv valoarea unitara/produsul ofertat  trebuie sa depasesca valoarea de 2500 lei cu TVA\".\r\n\r\nOperatorii economici interesati pot depune oferte pentru unul sau pentru mai multe loturi.\r\n\r\nOfertantii vor depune in cadrul ofertei tehnice, modelul de contract insusit sau declaratie de acceptare a clauzelor contractuale.\r\n\r\n In cazul in care doua sau mai multe oferte/lot au o valoare totala egala a propunerii financiare si sunt clasate pe acelasi loc, in vederea\r\n\r\ndepartajarii, Autoritatea contractanta solicita noi propuneri financiare acestora. In situatia in care egalitatea se mentine,\r\n\r\nautoritatea  contractanta  are  dreptul  sa  solicite  noi  propuneri  financiare,  si  oferta  castigatoare  va  fi  desemnata  cea  cu  propunerea\r\n\r\nfinanciara cea mai mica.\r\n\r\nOfertantii vor declara respectarea, la intocmirea ofertei, a obligatiilor relevante din domeniile mediului, social si al relatiilor de munca,\r\n\r\nconform dispozitiilor art. 51 din Legea nr. 98/2016. Pe parcursul executarii contractului, operatorii economici vor respecta reglementarile\r\n\r\nobligatorii in domeniul mediului, social si al relatiilor de munca. In acest sens, informatii', 3, '2021-07-05 10:47:47', '2021-07-05 10:47:47'),
(58, 1, 4, 'exemplu1', '1625729807_FisaDate_DF1098083.pdf', '../storage/app/public/uploads/1625729807_FisaDate_DF1098083.pdf', 'UNIVERSITATEA PETROL SI GAZE', '2844790_2020_PAAPD1138883', '2844790', 'Strada: Bulevardul Bucuresti, nr. 39', 'Ploiesti', '100680', 'Romania', 'RO316 Prahova', 'birou_achizitii@upg-ploiesti.ro', '40 244575659/ 40 244573171/242', '40 24457584/ 40 244575312', 'BULEARCA CLAUDIA', 'Echipamente IT', 'FurnizareCumparare', 'Universitatea Petrol Gaze Ploiesti isi propune sa atribuire un contract de achizitie publica pentru furnizarea produselor\r\n\r\n\"ECHIPAMENTE  IT  -grupate  pe  3  loturi,cu  scopul  asigurarii/dotarii    bazei  materiale,  in  vederea  desfasurarii  in  bune  conditii  a\r\n\r\nactivitatilor didatice si de cercetare din cadrul laboratoarelor/departamentelor universitatii. Specificatiile tehnice ale echipamentelor\r\n\r\nIT sunt detaliate in  caietul  de sarcini', '183151.29', 'RON', 'LA  ELABORAREA  OFERTELOR  SE  VA  TINE  CONT  DE  MENTIUNEA  SPECIFICATA  IN  CAIETUL  DE  SARCINI  PENTRU  LOTUl  1:\r\n\r\n\"Conform conditiilor impuse de minister (MEC) valoarea unitara a produselor ofertatecelor fixe produsele ofertate, la categoria mijloacelor\r\n\r\nfixe, respectiv valoarea unitara/produsul ofertat  trebuie sa depasesca valoarea de 2500 lei cu TVA\".\r\n\r\nOperatorii economici interesati pot depune oferte pentru unul sau pentru mai multe loturi.\r\n\r\nOfertantii vor depune in cadrul ofertei tehnice, modelul de contract insusit sau declaratie de acceptare a clauzelor contractuale.\r\n\r\n In cazul in care doua sau mai multe oferte/lot au o valoare totala egala a propunerii financiare si sunt clasate pe acelasi loc, in vederea\r\n\r\ndepartajarii, Autoritatea contractanta solicita noi propuneri financiare acestora. In situatia in care egalitatea se mentine,\r\n\r\nautoritatea  contractanta  are  dreptul  sa  solicite  noi  propuneri  financiare,  si  oferta  castigatoare  va  fi  desemnata  cea  cu  propunerea\r\n\r\nfinanciara cea mai mica.\r\n\r\nOfertantii vor declara respectarea, la intocmirea ofertei, a obligatiilor relevante din domeniile mediului, social si al relatiilor de munca,\r\n\r\nconform dispozitiilor art. 51 din Legea nr. 98/2016. Pe parcursul executarii contractului, operatorii economici vor respecta reglementarile\r\n\r\nobligatorii in domeniul mediului, social si al relatiilor de munca. In acest sens, informatii', 3, '2021-07-08 04:36:47', '2021-07-08 04:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `lots`
--

CREATE TABLE `lots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_licitatie` int(11) NOT NULL,
  `denumire_lot` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriere_achizitie` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `criteriu_atribuire` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_variante` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durata_contract` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valoare_totala_ftva` double DEFAULT NULL,
  `valoare_garantie_ftva` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lots`
--

INSERT INTO `lots` (`id`, `id_licitatie`, `denumire_lot`, `descriere_achizitie`, `criteriu_atribuire`, `info_variante`, `durata_contract`, `valoare_totala_ftva`, `valoare_garantie_ftva`, `created_at`, `updated_at`) VALUES
(85, 45, 'Lot 1 - sisteme Pc all-in-one ( licente windows 10 pro 64 bits si microsoft office 2019 home and business 64 bits) si monitoare', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nLot 1 - sisteme Pc all-in-one ( licente windows 10 pro 64 bits si microsoft office 2019 home and business 64 bits) si monitoare\r\n\r\nsuplimentare = 132 buc.\r\n\r\nMonitoare suplimentare =   29 buc.\r\ns-a modificat', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nDenumire factor evaluare	Descriere	Pondere	\r\nCapacitatea RAM	Raportat la cerinta minima aferentearticolului \"Capacitate Memorie\"de la punctele: 1.2. - Lot 1 dincaietul de sarcini.Ofertarea unei capacitatisuplimentare fata de cerintaminima asigura o crestere a vitezeide executie a sarcinilor, se evitablocajele, scade nevoie deutilizarea a memoriei virtuale cuimplicatie directa in gradul deutilizare al SSD/HDD, asigurandu-se astfel o performanta crescuta asistemului de calcul.Capacitatea RAM se masoara incadrul prezentului criteriu in GB(Gigabyte).Punctajul maxim care se poateobtine pentru cea mai marecapacitate RAM ofertata - 5puncte.	\r\n5yb\r\nPunctaj maxim factor: 5	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 23.10.2020 08:20	Pagina 2\r\n\r\nAlgoritm de calcul: Formula de calcul a punctajului pentru capacitatea RAM este: [ (C-CMIN)/ (CMAX-CMIN) ]*5 = PRAMC Unde: C- capacitatea de memorie instalata din ofertaCMIN - capacitatea de memorie minim ofertataCMAX - capacitatea de memorie maxim ofertataPRAMC - punctajul obtinut de ofertant pentru capacitatea de memorie instalataIn cazul in care toate ofertele sunt egale la acest criteriu se va acorda punctaj maxim (5 puncte) tuturorofertantilor.\r\nFrecventa RAM	(raportat la cerinta minimaaferente articolului \"FrecventaMemorie\" de la punctele: 1.2. - Lot1 din caietul de sarcini)Frecventa RAM reprezinta viteza detransfer a informatiei intreprocesor si SSD/HDD, astfelofertarea unor memorii cu ofrecventa mai mare decat frecventaminima solicitata reprezinta unavantaj pentru autoritateacontractanta prin cresterea vitezeide reactie a sistemului inansamblu.Frecventa RAM va fi exprimata inMHz.Punctajul maxim ce se poateobtine pentru cea mai marefrecventa RAM este de 5 puncte.	\r\n5yb\r\nPunctaj maxim factor: 5	\r\nAlgoritm de calcul: Formula de calcul a punctajului pentru frecventa RAM este:[(F-FMIN)/(FMAX-FMIN)]*5 =PRAMFUnde:F - frecventa memoriei instalate din ofertaFMIN - frecventa memoriei instalate minima ofertataFMAX - frecventa memoriei instalate maxima ofertataPRAMF - Punctajul obtinut de ofertant pentru frecventa memoriei instalateIn cazul in care toate ofertele sunt egale la acest criteriu se va acorda punctaj maxim (5 puncte) pentru acestcriteriu tuturor ofertantilor.Punctajul maxim pentru memoria RAM instalata care se poate obtine pentru cea mai mare valoare este de 10puncte.Punctajul pentru memoria RAM este reprezentat de suma celor doua componente descrise mai sus si secalculeaza utilizand formula:PRAM=PRAMC PRAMFUnde:PRAM - Punctajul obtinut de ofertant pentru memoria RAM instalataPRAMC - Punctajul obtinut de ofertant pentru capacitatea de memorie instalata PRAMF - Punctajul obtinut deofertant pentru frecventa memoriei instalateIn cazul in care doua sau mai multe oferte sunt clasate pe primul loc, cu punctaje egale, departajarea se va faceavand in vedere punctajul obtinut la factorii de evaluare in ordinea descrescatore a ponderilor acestora. Insituatia in care egalitatea se mentine, Autoritatea Contractanta are dreptul sa solicite noi propuneri financiare, sioferta castigatoare va fi desemnata cea cu propunerea financiara cea mai mica.\r\nPretul ofertei	Componenta financiara	80yb\r\nPunctaj maxim factor: 80	\r\nAlgoritm de calcul: Punctajul se acorda astfel: a) Pentru cel mai scazut dintre preturi se acorda punctajul maximalocat; b) Pentru celelalte preturi ofertate punctajul P(n) se calculeaza proportional, astfel: P(n) = (Pret minimofertat / Pret n) x punctaj maxim alocat.\r\nPunctajul obtinut de procesor(CPU) in benchmark	Raportat la cerinta minima aferentaarticolului\" Procesor\" de lapunctele: 1.1. - Lot 1 din caietul desarciniValorile de referinta folosite inevaluare sunt cele furnizate pehttp://www.cpubenchmark.net  la\"average CPU Mark\" pe care levom numi in continuare scor si seva nota cu \"S\".Fiecare ofertant va primi un scor insensul prezentului criteriu infunctie de procesorul computeruluiofertat.	\r\n10yb\r\nPunctaj maxim factor: 10	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 23.10.2020 08:20	Pagina 3', 'Vor fi acceptate variante: Nu', 'Durata in luni: 2; Durata in zile : -Contractul se reinnoieste: Nu', 1037599.13, '1,0000.%', '2021-06-23 12:21:38', '2021-06-23 12:21:38'),
(86, 45, 'Lot 2 - laptop (licente windows 10 pro 64 bits si microsoft office 2019 home and business 64 bits)', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nLot 2 - laptop (licente windows 10 pro 64 bits si microsoft office 2019 home and business 64 bits) = 46 buc.\r\n\r\nmerge modificarea', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nAlgoritm de calcul: Punctajul pe care fiecare ofertant il va obtine la acest criteriu se va calcula folosindurmatoarea formula:[ (S - SMINIM)/ (SMAXIM- SMINIM) ]*10= PPROCESORUnde: S - Scorul obtinut de ofertant ca urmare a indicariiSMINIM - Scorul minim ofertatSMAXIM - Scorul maxim ofertatPProcesor - Punctajul obtinut pentru procesor.In cazul in care toate ofertele sunt egale la acest criteriu se va acorda punctaj maxim (10 puncte) pentru acestcriteriu tuturor ofertantilor.\r\nPunctaj maxim total: 100\r\nDenumire factor evaluare	Descriere	Pondere	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 23.10.2020 08:20	Pagina 4\r\n\r\nFrecventa RAM - maxim 5 puncte	Factorul este raportat la cerintaminima aferente articolului\"Frecventa Memorie\" de lapunctele: 2.2.- Lot 2, din caietul desarcini.Frecventa RAM reprezinta viteza detransfer a informatiei intreprocesor si SSD/HDD, astfelofertarea unor memorii cu ofrecventa mai mare decat frecventaminima solicitata reprezinta unavantaj pentru autoritateacontractanta prin cresterea vitezeide reactie a sistemului inansamblu.Frecventa RAM va fi exprimata inMHz.	\r\n5yb\r\nPunctaj maxim factor: 5	\r\nAlgoritm de calcul: Formula de calcul a punctajului pentru frecventa RAM este:[(F-FMIN)/(FMAX-FMIN)]*5 =PRAMFUnde:F - frecventa memoriei instalate din ofertaFMIN - frecventa memoriei instalate minima ofertataFMAX - frecventa memoriei instalate maxima ofertataPRAMF - Punctajul obtinut de ofertant pentru frecventa memoriei instalateIn cazul in care toate ofertele sunt egale la acest criteriu se va acorda punctaj maxim (5 puncte) pentru acestcriteriu tuturor ofertantilor.Punctajul maxim pentru memoria RAM instalata care se poate obtine pentru cea mai mare valoare este de 10puncte.Punctajul pentru memoria RAM este reprezentat de suma celor doua componente si se calculeaza utilizandformula:PRAM=PRAMC PRAMFUnde:PRAM - Punctajul obtinut de ofertant pentru memoria RAM instalataPRAMC - Punctajul obtinut de ofertant pentru capacitatea de memorie instalata PRAMF - Punctajul obtinut deofertant pentru frecventa memoriei instalateIn cazul in care doua sau mai multe oferte sunt clasate pe primul loc, cu punctaje egale, departajarea se va faceavand in vedere punctajul obtinut la factorii de evaluare in ordinea descrescatore a ponderilor acestora. Insituatia in care egalitatea se mentine, Autoritatea Contractanta are dreptul sa solicite noi propuneri financiare, sioferta castigatoare va fi desemnata cea cu propunerea financiara cea mai mica.\r\nPunctajul obtinut de procesor(CPU) in benchmark	Raportat la cerinta minima aferentaarticolului\" Procesor\" de lapunctele: 2.1.- Lot 2 din caietul desarcini.Valorile de referinta folosite inevaluare sunt cele furnizate pehttp://www.cpubenchmark.net  la\"average CPU Mark\" pe care levom numi in continuare scor si seva nota cu \"S\". Fiecare ofertant va primi un scor insensul prezentului criteriu infunctie de procesorul computeruluiofertat.	\r\n10yb\r\nPunctaj maxim factor: 10	\r\nAlgoritm de calcul: Punctajul pe care fiecare ofertant il va obtine la acest criteriu se va calcula folosindurmatoarea formula:[ (S - SMINIM)/ (SMAXIM- SMINIM) ]*10= PPROCESORUnde:S - Scorul obtinut de ofertant ca urmare a indicariiSMINIM - Scorul minim ofertatSMAXIM - Scorul maxim ofertatPProcesor - Punctajul obtinut pentru procesor.In cazul in care toate ofertele sunt egale la acest criteriu se va acorda punctaj maxim (1O puncte) pentru acestcriteriu tuturor ofertantilor.\r\nPretul ofertei	Componenta financiara	80yb\r\nPunctaj maxim factor: 80	\r\nAlgoritm de calcul: Punctajul se acorda astfel: a) Pentru cel mai scazut dintre preturi se acorda punctajul maximalocat; b) Pentru celelalte preturi ofertate punctajul P(n) se calculeaza proportional, astfel: P(n) = (Pret minimofertat / Pret n) x punctaj maxim alocat.	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 23.10.2020 08:20	Pagina 5', 'Vor fi acceptate variante: Nu', 'Durata in luni: 2; Durata in zile : -Contractul se reinnoieste: Nu', 413431.9, '0,9999.%', '2021-06-23 12:21:38', '2021-06-23 12:21:38'),
(105, 54, 'LOT 1 - Presa digitala B-W cu sistem de alimentare din rola', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nObiectul contractului este dat de necesitatea achizitiei de echipamente tipografice loturile 1, 2 si 3, respectiv:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat.\r\n\r\nIn urma realizarii achizitiei produselor care fac obiectul contractelor de furnizare utilaje si echipamente tipografice, autoritatea\r\n\r\ncontractanta identifica beneficii precum:\r\n\r\no   eficientizarea costurilor de productie, de intretinere si de reparatie;\r\n\r\no   optimizarea consumurilor specifice;\r\n\r\no   cresterea gradului calitativ al produselor cartografice realizate, tiparite si multiplicate;\r\n\r\no   micsorarea timpului de realizare a produselor si cresterea gradului de asumare a termenelor de predare catre beneficiari;\r\n\r\no   reducerea timpilor necesari efectuarii reparatiilor echipamentelor si eficientizarea suportului tehnic de specialitate acordat pentru\r\n\r\nintretinerea si repararea echipamentelor, prin reorientarea catre piata pieselor de schimb pentru echipamentele noi.', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nDenumire factor evaluare	Descriere	Pondere	\r\nPretul ofertei	Componenta financiara	70\\b\r\nPunctaj maxim factor: 70	\r\nAlgoritm de calcul: Punctajul se acorda astfel: a) Pentru cel mai scazut dintre preturi se acorda punctajul maximalocat; b) Pentru celelalte preturi ofertate punctajul P(n) se calculeaza proportional, astfel: P(n) = (Pret minimofertat / Pret n) x punctaj maxim alocat.	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 2', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 1008403, '1,00', '2021-07-05 10:45:20', '2021-07-05 10:45:20'),
(106, 54, 'LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nObiectul contractului este dat de necesitatea achizitiei de echipamente tipografice loturile 1, 2 si 3, respectiv:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat.\r\n\r\nIn urma realizarii achizitiei produselor care fac obiectul contractelor de furnizare utilaje si echipamente tipografice, autoritatea\r\n\r\ncontractanta identifica beneficii precum:\r\n\r\no   eficientizarea costurilor de productie, de intretinere si de reparatie;\r\n\r\no   optimizarea consumurilor specifice;\r\n\r\no   cresterea gradului calitativ al produselor cartografice realizate, tiparite si multiplicate;\r\n\r\no   micsorarea timpului de realizare a produselor si cresterea gradului de asumare a termenelor de predare catre beneficiari;\r\n\r\no   reducerea timpilor necesari efectuarii reparatiilor echipamentelor si eficientizarea suportului tehnic de specialitate acordat pentru\r\n\r\nintretinerea si repararea echipamentelor, prin reorientarea catre piata pieselor de schimb pentru echipamentele noi.', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nDenumire factor evaluare	Descriere	Pondere	\r\nTermenul de livrare si instalare	Acest factor indica capacitateaofertantilor de a furnizaechipamentele in termenul cel maiscurt posibil. Acest factor sedemonstreaza prin emiterea unuigrafic de livrare. Punctaj maximtotal 10.	\r\n10\\b\r\nPunctaj maxim factor: 10	\r\nAlgoritm de calcul: Pentru livrarea si instalarea echipamentelor aferente celor 3 loturi intr-un termen cuprinsintre 31 si 60 zile se va acorda un punctaj de 0 puncte.Pentru livrarea si instalarea echipamentelor aferente celor 3 loturi intr-un termen de maxim 30 de zile se vaacorda un punctaj de 10 pct.Termenul de livrare maxim punctat pentru toate cele 3 loturi este de 30 zile.Ofertele care prezinta un termen de livrare mai mare de 60 zile pentru loturile 1-3, vor fi considerateneconforme.\r\nPretul ofertei	Componenta financiara	70\\b\r\nPunctaj maxim factor: 70	\r\nAlgoritm de calcul: Punctajul se acorda astfel: a) Pentru cel mai scazut dintre preturi se acorda punctajul maximalocat; b) Pentru celelalte preturi ofertate punctajul P(n) se calculeaza proportional, astfel: P(n) = (Pret minimofertat / Pret n) x punctaj maxim alocat.\r\nPerioada de garantie acordataechipamentelor	Acest factor indica modul in careofertantul va declara si isi va insusiperioada de garantie aechipamentelor, dar nu mai putinde 12 luni.Ofertele care prezinta o garantiemai mica de 12 luni pentru loturile1-3, vor fi considerate neconforme.Perioada va fi exprimata in luni.Autoritatea contractanta acordapunctaj pentru ofertele careprezinta o perioada de garantie aechipamentului suplimentar fata deperioada de garantie minimacceptata (12 luni). Perioada degarantie suplimentara se vaprezenta obligatoriu in numar deluni. Punctaj maxim total 20.	\r\n20\\b\r\nPunctaj maxim factor: 20	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 4', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 672268, '1,00', '2021-07-05 10:45:20', '2021-07-05 10:45:20'),
(107, 54, 'LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nObiectul contractului este dat de necesitatea achizitiei de echipamente tipografice loturile 1, 2 si 3, respectiv:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat.\r\n\r\nIn urma realizarii achizitiei produselor care fac obiectul contractelor de furnizare utilaje si echipamente tipografice, autoritatea\r\n\r\ncontractanta identifica beneficii precum:\r\n\r\no   eficientizarea costurilor de productie, de intretinere si de reparatie;\r\n\r\no   optimizarea consumurilor specifice;\r\n\r\no   cresterea gradului calitativ al produselor cartografice realizate, tiparite si multiplicate;\r\n\r\no   micsorarea timpului de realizare a produselor si cresterea gradului de asumare a termenelor de predare catre beneficiari;\r\n\r\no   reducerea timpilor necesari efectuarii reparatiilor echipamentelor si eficientizarea suportului tehnic de specialitate acordat pentru\r\n\r\nintretinerea si repararea echipamentelor, prin reorientarea catre piata pieselor de schimb pentru echipamentele noi.', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nAlgoritm de calcul: Autoritatea contractanta acorda punctaj pentru ofertele care prezinta o perioada de garantiea echipamentului cuprinsa intre 12 si 24 de luni aplicand formula: P2 = (Gof/Gmax) x 20 unde: Gof = Garantiaofertata, Gmax = Garantia maxima punctata = 24 luni.NOTA: Ofertele care vor prezenta perioada de garantie a echipamentelor de 12 de luni pentru loturile 1-3 vorprimi 0 puncte. Ofertele care vor prezenta o perioada de garantie intre 13-23 luni vor primi 10 puncte.Ofertele care vor prezenta perioada de garantie a echipamentelor de 24 de luni, sau mai mare vor primi 20puncte.Garantia maxima punctata pentru toate cele 3 loturi este de 24 luni.\r\nPunctaj maxim total: 100	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 5', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 606721, '1,00', '2021-07-05 10:45:20', '2021-07-05 10:45:20'),
(108, 55, 'LOT 1 - Presa digitala B-W cu sistem de alimentare din rola', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nObiectul contractului este dat de necesitatea achizitiei de echipamente tipografice loturile 1, 2 si 3, respectiv:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat.\r\n\r\nIn urma realizarii achizitiei produselor care fac obiectul contractelor de furnizare utilaje si echipamente tipografice, autoritatea\r\n\r\ncontractanta identifica beneficii precum:\r\n\r\no   eficientizarea costurilor de productie, de intretinere si de reparatie;\r\n\r\no   optimizarea consumurilor specifice;\r\n\r\no   cresterea gradului calitativ al produselor cartografice realizate, tiparite si multiplicate;\r\n\r\no   micsorarea timpului de realizare a produselor si cresterea gradului de asumare a termenelor de predare catre beneficiari;\r\n\r\no   reducerea timpilor necesari efectuarii reparatiilor echipamentelor si eficientizarea suportului tehnic de specialitate acordat pentru\r\n\r\nintretinerea si repararea echipamentelor, prin reorientarea catre piata pieselor de schimb pentru echipamentele noi.', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nDenumire factor evaluare	Descriere	Pondere	\r\nPretul ofertei	Componenta financiara	70\\b\r\nPunctaj maxim factor: 70	\r\nAlgoritm de calcul: Punctajul se acorda astfel: a) Pentru cel mai scazut dintre preturi se acorda punctajul maximalocat; b) Pentru celelalte preturi ofertate punctajul P(n) se calculeaza proportional, astfel: P(n) = (Pret minimofertat / Pret n) x punctaj maxim alocat.	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 2', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 1008403, '1,00', '2021-07-05 10:45:45', '2021-07-05 10:45:45'),
(109, 55, 'LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nObiectul contractului este dat de necesitatea achizitiei de echipamente tipografice loturile 1, 2 si 3, respectiv:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat.\r\n\r\nIn urma realizarii achizitiei produselor care fac obiectul contractelor de furnizare utilaje si echipamente tipografice, autoritatea\r\n\r\ncontractanta identifica beneficii precum:\r\n\r\no   eficientizarea costurilor de productie, de intretinere si de reparatie;\r\n\r\no   optimizarea consumurilor specifice;\r\n\r\no   cresterea gradului calitativ al produselor cartografice realizate, tiparite si multiplicate;\r\n\r\no   micsorarea timpului de realizare a produselor si cresterea gradului de asumare a termenelor de predare catre beneficiari;\r\n\r\no   reducerea timpilor necesari efectuarii reparatiilor echipamentelor si eficientizarea suportului tehnic de specialitate acordat pentru\r\n\r\nintretinerea si repararea echipamentelor, prin reorientarea catre piata pieselor de schimb pentru echipamentele noi.', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nDenumire factor evaluare	Descriere	Pondere	\r\nTermenul de livrare si instalare	Acest factor indica capacitateaofertantilor de a furnizaechipamentele in termenul cel maiscurt posibil. Acest factor sedemonstreaza prin emiterea unuigrafic de livrare. Punctaj maximtotal 10.	\r\n10\\b\r\nPunctaj maxim factor: 10	\r\nAlgoritm de calcul: Pentru livrarea si instalarea echipamentelor aferente celor 3 loturi intr-un termen cuprinsintre 31 si 60 zile se va acorda un punctaj de 0 puncte.Pentru livrarea si instalarea echipamentelor aferente celor 3 loturi intr-un termen de maxim 30 de zile se vaacorda un punctaj de 10 pct.Termenul de livrare maxim punctat pentru toate cele 3 loturi este de 30 zile.Ofertele care prezinta un termen de livrare mai mare de 60 zile pentru loturile 1-3, vor fi considerateneconforme.\r\nPretul ofertei	Componenta financiara	70\\b\r\nPunctaj maxim factor: 70	\r\nAlgoritm de calcul: Punctajul se acorda astfel: a) Pentru cel mai scazut dintre preturi se acorda punctajul maximalocat; b) Pentru celelalte preturi ofertate punctajul P(n) se calculeaza proportional, astfel: P(n) = (Pret minimofertat / Pret n) x punctaj maxim alocat.\r\nPerioada de garantie acordataechipamentelor	Acest factor indica modul in careofertantul va declara si isi va insusiperioada de garantie aechipamentelor, dar nu mai putinde 12 luni.Ofertele care prezinta o garantiemai mica de 12 luni pentru loturile1-3, vor fi considerate neconforme.Perioada va fi exprimata in luni.Autoritatea contractanta acordapunctaj pentru ofertele careprezinta o perioada de garantie aechipamentului suplimentar fata deperioada de garantie minimacceptata (12 luni). Perioada degarantie suplimentara se vaprezenta obligatoriu in numar deluni. Punctaj maxim total 20.	\r\n20\\b\r\nPunctaj maxim factor: 20	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 4', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 672268, '1,00', '2021-07-05 10:45:45', '2021-07-05 10:45:45'),
(110, 55, 'LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nObiectul contractului este dat de necesitatea achizitiei de echipamente tipografice loturile 1, 2 si 3, respectiv:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat.\r\n\r\nIn urma realizarii achizitiei produselor care fac obiectul contractelor de furnizare utilaje si echipamente tipografice, autoritatea\r\n\r\ncontractanta identifica beneficii precum:\r\n\r\no   eficientizarea costurilor de productie, de intretinere si de reparatie;\r\n\r\no   optimizarea consumurilor specifice;\r\n\r\no   cresterea gradului calitativ al produselor cartografice realizate, tiparite si multiplicate;\r\n\r\no   micsorarea timpului de realizare a produselor si cresterea gradului de asumare a termenelor de predare catre beneficiari;\r\n\r\no   reducerea timpilor necesari efectuarii reparatiilor echipamentelor si eficientizarea suportului tehnic de specialitate acordat pentru\r\n\r\nintretinerea si repararea echipamentelor, prin reorientarea catre piata pieselor de schimb pentru echipamentele noi.', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nAlgoritm de calcul: Autoritatea contractanta acorda punctaj pentru ofertele care prezinta o perioada de garantiea echipamentului cuprinsa intre 12 si 24 de luni aplicand formula: P2 = (Gof/Gmax) x 20 unde: Gof = Garantiaofertata, Gmax = Garantia maxima punctata = 24 luni.NOTA: Ofertele care vor prezenta perioada de garantie a echipamentelor de 12 de luni pentru loturile 1-3 vorprimi 0 puncte. Ofertele care vor prezenta o perioada de garantie intre 13-23 luni vor primi 10 puncte.Ofertele care vor prezenta perioada de garantie a echipamentelor de 24 de luni, sau mai mare vor primi 20puncte.Garantia maxima punctata pentru toate cele 3 loturi este de 24 luni.\r\nPunctaj maxim total: 100	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 5', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 606721, '1,00', '2021-07-05 10:45:45', '2021-07-05 10:45:45'),
(111, 56, 'LOT 1 - Presa digitala B-W cu sistem de alimentare din rola', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nObiectul contractului este dat de necesitatea achizitiei de echipamente tipografice loturile 1, 2 si 3, respectiv:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat.\r\n\r\nIn urma realizarii achizitiei produselor care fac obiectul contractelor de furnizare utilaje si echipamente tipografice, autoritatea\r\n\r\ncontractanta identifica beneficii precum:\r\n\r\no   eficientizarea costurilor de productie, de intretinere si de reparatie;\r\n\r\no   optimizarea consumurilor specifice;\r\n\r\no   cresterea gradului calitativ al produselor cartografice realizate, tiparite si multiplicate;\r\n\r\no   micsorarea timpului de realizare a produselor si cresterea gradului de asumare a termenelor de predare catre beneficiari;\r\n\r\no   reducerea timpilor necesari efectuarii reparatiilor echipamentelor si eficientizarea suportului tehnic de specialitate acordat pentru\r\n\r\nintretinerea si repararea echipamentelor, prin reorientarea catre piata pieselor de schimb pentru echipamentele noi.', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nDenumire factor evaluare	Descriere	Pondere	\r\nPretul ofertei	Componenta financiara	70\\b\r\nPunctaj maxim factor: 70	\r\nAlgoritm de calcul: Punctajul se acorda astfel: a) Pentru cel mai scazut dintre preturi se acorda punctajul maximalocat; b) Pentru celelalte preturi ofertate punctajul P(n) se calculeaza proportional, astfel: P(n) = (Pret minimofertat / Pret n) x punctaj maxim alocat.	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 2', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 1008403, '1,00', '2021-07-05 10:47:31', '2021-07-05 10:47:31'),
(112, 56, 'LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nObiectul contractului este dat de necesitatea achizitiei de echipamente tipografice loturile 1, 2 si 3, respectiv:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat.\r\n\r\nIn urma realizarii achizitiei produselor care fac obiectul contractelor de furnizare utilaje si echipamente tipografice, autoritatea\r\n\r\ncontractanta identifica beneficii precum:\r\n\r\no   eficientizarea costurilor de productie, de intretinere si de reparatie;\r\n\r\no   optimizarea consumurilor specifice;\r\n\r\no   cresterea gradului calitativ al produselor cartografice realizate, tiparite si multiplicate;\r\n\r\no   micsorarea timpului de realizare a produselor si cresterea gradului de asumare a termenelor de predare catre beneficiari;\r\n\r\no   reducerea timpilor necesari efectuarii reparatiilor echipamentelor si eficientizarea suportului tehnic de specialitate acordat pentru\r\n\r\nintretinerea si repararea echipamentelor, prin reorientarea catre piata pieselor de schimb pentru echipamentele noi.', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nDenumire factor evaluare	Descriere	Pondere	\r\nTermenul de livrare si instalare	Acest factor indica capacitateaofertantilor de a furnizaechipamentele in termenul cel maiscurt posibil. Acest factor sedemonstreaza prin emiterea unuigrafic de livrare. Punctaj maximtotal 10.	\r\n10\\b\r\nPunctaj maxim factor: 10	\r\nAlgoritm de calcul: Pentru livrarea si instalarea echipamentelor aferente celor 3 loturi intr-un termen cuprinsintre 31 si 60 zile se va acorda un punctaj de 0 puncte.Pentru livrarea si instalarea echipamentelor aferente celor 3 loturi intr-un termen de maxim 30 de zile se vaacorda un punctaj de 10 pct.Termenul de livrare maxim punctat pentru toate cele 3 loturi este de 30 zile.Ofertele care prezinta un termen de livrare mai mare de 60 zile pentru loturile 1-3, vor fi considerateneconforme.\r\nPretul ofertei	Componenta financiara	70\\b\r\nPunctaj maxim factor: 70	\r\nAlgoritm de calcul: Punctajul se acorda astfel: a) Pentru cel mai scazut dintre preturi se acorda punctajul maximalocat; b) Pentru celelalte preturi ofertate punctajul P(n) se calculeaza proportional, astfel: P(n) = (Pret minimofertat / Pret n) x punctaj maxim alocat.\r\nPerioada de garantie acordataechipamentelor	Acest factor indica modul in careofertantul va declara si isi va insusiperioada de garantie aechipamentelor, dar nu mai putinde 12 luni.Ofertele care prezinta o garantiemai mica de 12 luni pentru loturile1-3, vor fi considerate neconforme.Perioada va fi exprimata in luni.Autoritatea contractanta acordapunctaj pentru ofertele careprezinta o perioada de garantie aechipamentului suplimentar fata deperioada de garantie minimacceptata (12 luni). Perioada degarantie suplimentara se vaprezenta obligatoriu in numar deluni. Punctaj maxim total 20.	\r\n20\\b\r\nPunctaj maxim factor: 20	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 4', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 672268, '1,00', '2021-07-05 10:47:31', '2021-07-05 10:47:31'),
(113, 56, 'LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nObiectul contractului este dat de necesitatea achizitiei de echipamente tipografice loturile 1, 2 si 3, respectiv:\r\n\r\n- LOT 1 - Presa digitala B-W cu sistem de alimentare din rola\r\n\r\n- LOT 2 - Plotter foto productivitate mare, Masa taiere 1600X1200mm si Masa pneumatica caserat 1600x3000mm\r\n\r\n- LOT 3 - Presa digitala color, Echipament de brosat A3 cu pur si termoclei si Laminator A3 automat.\r\n\r\nIn urma realizarii achizitiei produselor care fac obiectul contractelor de furnizare utilaje si echipamente tipografice, autoritatea\r\n\r\ncontractanta identifica beneficii precum:\r\n\r\no   eficientizarea costurilor de productie, de intretinere si de reparatie;\r\n\r\no   optimizarea consumurilor specifice;\r\n\r\no   cresterea gradului calitativ al produselor cartografice realizate, tiparite si multiplicate;\r\n\r\no   micsorarea timpului de realizare a produselor si cresterea gradului de asumare a termenelor de predare catre beneficiari;\r\n\r\no   reducerea timpilor necesari efectuarii reparatiilor echipamentelor si eficientizarea suportului tehnic de specialitate acordat pentru\r\n\r\nintretinerea si repararea echipamentelor, prin reorientarea catre piata pieselor de schimb pentru echipamentele noi.', 'Cel mai bun raport calitate - pret\r\n\r\n \r\n\r\n \r\n	\r\nAlgoritm de calcul: Autoritatea contractanta acorda punctaj pentru ofertele care prezinta o perioada de garantiea echipamentului cuprinsa intre 12 si 24 de luni aplicand formula: P2 = (Gof/Gmax) x 20 unde: Gof = Garantiaofertata, Gmax = Garantia maxima punctata = 24 luni.NOTA: Ofertele care vor prezenta perioada de garantie a echipamentelor de 12 de luni pentru loturile 1-3 vorprimi 0 puncte. Ofertele care vor prezenta o perioada de garantie intre 13-23 luni vor primi 10 puncte.Ofertele care vor prezenta perioada de garantie a echipamentelor de 24 de luni, sau mai mare vor primi 20puncte.Garantia maxima punctata pentru toate cele 3 loturi este de 24 luni.\r\nPunctaj maxim total: 100	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 01.07.2019 08:08	Pagina 5', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 606721, '1,00', '2021-07-05 10:47:31', '2021-07-05 10:47:31'),
(114, 57, 'Lot 1-Dotari', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nSistem PC /Calculator -37 buc;Laptopuri-4 buc', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 100840.34, '0,9996', '2021-07-05 10:47:50', '2021-07-05 10:47:50'),
(115, 57, 'Lot 2-IWCF', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 19.10.2020 15:05	Pagina 2\r\n\r\nLaptopuri-6 buc', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 58823.54, '0,9996', '2021-07-05 10:47:50', '2021-07-05 10:47:50'),
(116, 57, 'Lot 3-DIDFR-DSE-CC', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nMultifunctional laser -1 buc-DIDFR;Sistem All-in-One-2 buc-DSE;Laptop-3 buc-CC;Videoproiector -3 buc-CC', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu	Sistemul Electronic de Achizitii Publice	Sistemul Electronic de Achizitii Publice, 19.10.2020 15:05	Pagina 3', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 23487.41, '0,9963', '2021-07-05 10:47:50', '2021-07-05 10:47:50'),
(117, 58, 'Lot 1-Dotari', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\n\n\nSistem PC /Calculator -37 buc;Laptopuri-4 buc', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -\n\nContractul se reinnoieste: Nu', 100840.34, '0,9996', '2021-07-08 04:37:31', '2021-07-08 04:37:31'),
(118, 58, 'Lot 2-IWCF', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\n\n	\nSistemul Electronic de Achizitii Publice	\nSistemul Electronic de Achizitii Publice, 19.10.2020 15:05	Pagina 2\n\nLaptopuri-6 buc', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -\n\nContractul se reinnoieste: Nu', 58823.54, '0,9996', '2021-07-08 04:37:31', '2021-07-08 04:37:31'),
(119, 58, 'Lot 3-DIDFR-DSE-CC', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\n\n\nMultifunctional laser -1 buc-DIDFR;Sistem All-in-One-2 buc-DSE;Laptop-3 buc-CC;Videoproiector -3 buc-CC', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu\n	\nSistemul Electronic de Achizitii Publice	\nSistemul Electronic de Achizitii Publice, 19.10.2020 15:05	Pagina 3', 'Durata in luni: 4; Durata in zile : -\n\nContractul se reinnoieste: Nu', 23487.41, '0,9963', '2021-07-08 04:37:31', '2021-07-08 04:37:31'),
(120, 58, 'Lot 1-Dotari', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\n\n\nSistem PC /Calculator -37 buc;Laptopuri-4 buc', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -\n\nContractul se reinnoieste: Nu', 100840.34, '0,9996', '2021-07-08 04:37:56', '2021-07-08 04:37:56'),
(121, 58, 'Lot 2-IWCF', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\n\n	\nSistemul Electronic de Achizitii Publice	\nSistemul Electronic de Achizitii Publice, 19.10.2020 15:05	Pagina 2\n\nLaptopuri-6 buc', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -\n\nContractul se reinnoieste: Nu', 58823.54, '0,9996', '2021-07-08 04:37:56', '2021-07-08 04:37:56'),
(122, 58, 'Lot 3-DIDFR-DSE-CC', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\n\n\nMultifunctional laser -1 buc-DIDFR;Sistem All-in-One-2 buc-DSE;Laptop-3 buc-CC;Videoproiector -3 buc-CC', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu\n	\nSistemul Electronic de Achizitii Publice	\nSistemul Electronic de Achizitii Publice, 19.10.2020 15:05	Pagina 3', 'Durata in luni: 4; Durata in zile : -\n\nContractul se reinnoieste: Nu', 23487.41, '0,9963', '2021-07-08 04:37:56', '2021-07-08 04:37:56'),
(123, 58, 'Lot 1-Dotari', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nSistem PC /Calculator -37 buc;Laptopuri-4 buc', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 100840.34, '0,9996', '2021-07-08 04:38:18', '2021-07-08 04:38:18'),
(124, 58, 'Lot 2-IWCF', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n	\r\nSistemul Electronic de Achizitii Publice	\r\nSistemul Electronic de Achizitii Publice, 19.10.2020 15:05	Pagina 2\r\n\r\nLaptopuri-6 buc', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 58823.54, '0,9996', '2021-07-08 04:38:18', '2021-07-08 04:38:18'),
(125, 58, 'Lot 3-DIDFR-DSE-CC', '(natura si cantitatea lucrarilor, produselor sau serviciilor sau o mentiune privind nevoile si cerintele)	\r\n\r\n\r\nMultifunctional laser -1 buc-DIDFR;Sistem All-in-One-2 buc-DSE;Laptop-3 buc-CC;Videoproiector -3 buc-CC', 'Pretul cel mai scazut', 'Vor fi acceptate variante: Nu	Sistemul Electronic de Achizitii Publice	Sistemul Electronic de Achizitii Publice, 19.10.2020 15:05	Pagina 3', 'Durata in luni: 4; Durata in zile : -Contractul se reinnoieste: Nu', 23487.41, '0,9963', '2021-07-08 04:38:18', '2021-07-08 04:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_05_21_095321_create_firmas_table', 1),
(7, '2014_10_12_000000_create_users_table', 2),
(8, '2021_06_16_195916_create_licitaties_table', 3),
(9, '2021_06_17_095855_create_lots_table', 3),
(10, '2021_06_23_161159_create_formulars_table', 4),
(11, '2021_06_23_220751_create_tip_formulars_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tip_formulars`
--

CREATE TABLE `tip_formulars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nume_formular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tip_formulars`
--

INSERT INTO `tip_formulars` (`id`, `nume_formular`, `template`, `template_path`, `created_at`, `updated_at`) VALUES
(11, 'Formular conflict de interese', 'sablon formular conflict de interese.php', '../storage/app/public/sabloane/sablon formular conflict de interese.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(12, 'Formular de subcontractare', 'sablon formular de subcontractare.php', '../storage/app/public/sabloane/sablon formular de subcontractare.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(13, 'Formular de experienta similara', 'sablon formular experienta similara.php', '../storage/app/public/sabloane/sablon formular experienta similara.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(14, 'Formular de respectarea regulilor conditiilor de munca', 'sablon formular respectarea regulilor conditiilor de munca.php', '../storage/app/public/sabloane/sablon formular respectarea regulilor conditiilor de munca.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(15, 'Acord de asociere', 'sablon_acord_asociere.php', '../storage/app/public/sabloane/sablon_acord_asociere.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(16, 'Acord cadru', 'sablon_acord_cadru.php', '../storage/app/public/sabloane/sablon_acord_cadru.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(17, 'Autorizare de livrare', 'sablon_autorizare_livrare.php', '../storage/app/public/sabloane/sablon_autorizare_livrare.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(18, 'Centralizator de preturi', 'sablon_centelizator_preturi.php', '../storage/app/public/sabloane/sablon_centelizator_preturi.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(19, 'Cerere de restituire a garantiei', 'sablon_cerere_restituire_garantie.php', '../storage/app/public/sabloane/sablon_cerere_restituire_garantie.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(20, 'Declaratie pentru cantitatile de utilaje', 'sablon_declaratie_cantitati_utilaje.php', '../storage/app/public/sabloane/sablon_declaratie_cantitati_utilaje.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(21, 'Declaratie de conformitate', 'sablon_declaratie_conformitate.php', '../storage/app/public/sabloane/sablon_declaratie_conformitate.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(22, 'Declaratie de eligibilitate', 'sablon_declaratie_eligibilitate.php', '../storage/app/public/sabloane/sablon_declaratie_eligibilitate.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(23, 'Declaratie de faliment', 'sablon_declaratie_faliment.php', '../storage/app/public/sabloane/sablon_declaratie_faliment.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(24, 'Declaratie pentru lista principalelor livrari din ultimii 3 ani', 'sablon_declaratie_lista_principale_livrari.php', '../storage/app/public/sabloane/sablon_declaratie_lista_principale_livrari.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(25, 'Declaratie de neincadrare in situatiile prevazute la art 181', 'sablon_declaratie_neincadrare.php', '../storage/app/public/sabloane/sablon_declaratie_neincadrare.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(26, 'Declaratie de personal angajat', 'sablon_declaratie_personal.php', '../storage/app/public/sabloane/sablon_declaratie_personal.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(27, 'Fisa tehnica', 'sablon_fisa_tehnica.php', '../storage/app/public/sabloane/sablon_fisa_tehnica.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(28, 'Formular de oferta', 'sablon_formular_oferta.php', '../storage/app/public/sabloane/sablon_formular_oferta.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(29, 'Scrisoare de garantie bancare de participare', 'sablon_garantie_participare.php', '../storage/app/public/sabloane/sablon_garantie_participare.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(30, 'Grafic de livrare', 'sablon_grafic_oferta.php', '../storage/app/public/sabloane/sablon_grafic_oferta.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(31, 'Imputernicire', 'sablon_imputernicire.php', '../storage/app/public/sabloane/sablon_imputernicire.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(32, 'Informatii generale', 'sablon_informatii_generale.php', '../storage/app/public/sabloane/sablon_informatii_generale.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(33, 'Proces de receptie', 'sablon_proces_receptie.php', '../storage/app/public/sabloane/sablon_proces_receptie.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(34, 'Scrisoare de clarificari', 'sablon_scrisoare_clarificari.php', '../storage/app/public/sabloane/sablon_scrisoare_clarificari.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36'),
(35, 'Scrisoare de inaintare', 'sablon_scrisoare_inaintare.php', '../storage/app/public/sabloane/sablon_scrisoare_inaintare.php', '2021-07-05 18:39:36', '2021-07-05 18:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_firma` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `id_firma`, `email_verified_at`, `password`, `verification_code`, `is_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cojanu', 'andrei@cojanu.com', NULL, '2021-05-26 21:03:57', '$2y$10$QLcbReB8Ill1f33iio4ALehP.xssZIWwwpBlAXQkRRmoVZhfPvcOG', 'bb1b2663fd576f41a5b27b870b63d23c2c9f49cc', 1, 'IjwzarxqfOAtfpsDt5Oc1hebVStlPqemkpEFJryYt1D4fK4tSNM5uO8GAref', '2021-05-26 19:49:16', '2021-07-05 16:08:44'),
(2, 'andrei2', 'andrei2@cojanu.com', NULL, '2021-05-26 21:03:49', '$2y$10$7O0E49bZvYq/nF2vJMeFGum3S.mijbzh6MCn/nrFGPrQiGmZQlsWu', '866e0d1d6ffb1fa923419fc6d8409978eec56060', 1, NULL, '2021-05-26 19:50:18', '2021-05-26 21:03:49'),
(3, 'andrei3', 'andrei3@cojanu.com', NULL, '2021-05-26 21:03:53', '$2y$10$qor3rOj5KarexWIBAe0ofOzE5EOU.VU8/mf2JeRBukRU5W01a.xOS', '9ed60754bbcfda0c4cdb73da1b50cb5d6747a574', 1, NULL, '2021-05-26 19:55:08', '2021-05-26 21:03:53'),
(4, 'andrei4', 'andrei4@cojanu.com', NULL, '2021-05-27 03:48:29', '$2y$10$T5ZlYTRKhGdvIStxaHWS3ORqGmQu2gb5vf73Vj3RoZ3Qvdr8lRjei', 'fde847acb4d395fc4c03f3e8b554f48e79ae7605', 1, NULL, '2021-05-26 21:05:22', '2021-05-27 03:48:29'),
(11, 'imp', 'imp@cojanu.com', 4, '2021-07-05 14:47:39', '$2y$10$0I5/.lgbVhMxuf/zJJRxXOZkzPQ2oPa8gC6DHg292GIkk1WFbRgw.', 'ddaad8f36eb687f177e601f39f7ae03047d0ef70', 1, NULL, '2021-07-05 14:46:13', '2021-07-05 14:47:39'),
(12, 'imp3', 'imp3@cojanu.com', 4, '2021-07-05 14:47:43', '$2y$10$UsSRRLeZScOUgqyWAgB1mu4FnMwg1D1qeGeGnqzlg1MULt6Iw7cl6', 'ded66a27a10b6ffc01d9e3b1a33f571cb92f6a4e', 1, NULL, '2021-07-05 14:46:32', '2021-07-05 14:47:43'),
(20, 'exemplu', 'exemplu@exemplu.com', NULL, '2021-07-08 04:29:27', '$2y$10$hUAFXAms6aBIytApS7TvpOv22W14.EYJbUYi0DJFKiIoG122Dg8IC', '65c149ae5a1dbeae47a0b6ebf36fb2ff23296f0b', 1, NULL, '2021-07-08 04:28:42', '2021-07-08 04:29:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `firmas`
--
ALTER TABLE `firmas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `firmas_cod_fiscal_unique` (`cod_fiscal`),
  ADD UNIQUE KEY `firmas_numar_inregistrare_unique` (`numar_inregistrare`),
  ADD UNIQUE KEY `firmas_email_firma_unique` (`email_firma`);

--
-- Indexes for table `formulars`
--
ALTER TABLE `formulars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licitaties`
--
ALTER TABLE `licitaties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tip_formulars`
--
ALTER TABLE `tip_formulars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firmas`
--
ALTER TABLE `firmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formulars`
--
ALTER TABLE `formulars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `licitaties`
--
ALTER TABLE `licitaties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tip_formulars`
--
ALTER TABLE `tip_formulars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
