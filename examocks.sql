-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 04:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examocks`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(7, 'Chemical Engineering'),
(4, 'Civil Engineering'),
(1, 'Computer Science'),
(2, 'Electrical Engineering'),
(3, 'Mechanical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `exam_name` varchar(300) NOT NULL,
  `exam_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_name`, `exam_description`) VALUES
(1, 'RSMSSB Basic Computer Instructor', 'RSMSSB Basic Computer Instructor');

-- --------------------------------------------------------

--
-- Table structure for table `mocks`
--

CREATE TABLE `mocks` (
  `mock_id` int(11) NOT NULL,
  `mock_title` varchar(200) NOT NULL,
  `mock_description` text NOT NULL,
  `mock_total_question` int(11) NOT NULL,
  `mock_total_duration` int(11) NOT NULL,
  `mock_total_marks` int(11) NOT NULL,
  `settings` longtext NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `exam_id` int(11) NOT NULL,
  `is_free` tinyint(1) NOT NULL DEFAULT 0,
  `mock_type` enum('Mock Test','Subject Test','Chapter Test') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mocks`
--

INSERT INTO `mocks` (`mock_id`, `mock_title`, `mock_description`, `mock_total_question`, `mock_total_duration`, `mock_total_marks`, `settings`, `is_active`, `created_at`, `exam_id`, `is_free`, `mock_type`) VALUES
(1, 'Mock-1', 'RSMSSB Basic Computer Instructor Mock-1', 10, 300, 5, '{\"restrict_attempts\":false,\"no_of_attempts\":null,\"disable_question_navigation\":false,\"list_questions\":true,\"auto_duration\":true,\"total_duration\":null,\"auto_grading\":true,\"correct_marks\":1,\"cutoff\":60,\"enable_negative_marking\":true,\"negative_marking_type\":\"percentage\",\"negative_marks\":33,\"disable_finish_button\":false,\"hide_solutions\":true}', 1, '2022-02-14 00:37:32', 1, 1, 'Mock Test'),
(2, 'Operating System', 'RSMSSB Basic Computer Instructor Mock-1', 5, 300, 5, '{\"restrict_attempts\":false,\"no_of_attempts\":null,\"disable_question_navigation\":false,\"list_questions\":true,\"auto_duration\":true,\"total_duration\":null,\"auto_grading\":true,\"correct_marks\":1,\"cutoff\":60,\"enable_negative_marking\":true,\"negative_marking_type\":\"percentage\",\"negative_marks\":33,\"disable_finish_button\":false,\"hide_solutions\":true}', 1, '2022-02-15 15:42:27', 1, 0, 'Subject Test');

-- --------------------------------------------------------

--
-- Table structure for table `mock_questions`
--

CREATE TABLE `mock_questions` (
  `mock_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mock_questions`
--

INSERT INTO `mock_questions` (`mock_id`, `question_id`, `section_id`) VALUES
(1, 1, 1),
(1, 24, 1),
(1, 25, 1),
(1, 26, 1),
(1, 64, 1),
(2, 426, 1),
(2, 429, 1),
(2, 437, 1),
(2, 491, 1),
(2, 493, 1),
(1, 153, 2),
(1, 212, 2),
(1, 240, 2),
(1, 257, 2),
(1, 261, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mock_response`
--

CREATE TABLE `mock_response` (
  `mock_response_id` int(11) NOT NULL,
  `mock_response_by` int(11) NOT NULL,
  `mock_response_text` text NOT NULL,
  `mock_response_attampt_time` datetime NOT NULL,
  `mock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mock_respose_questions`
--

CREATE TABLE `mock_respose_questions` (
  `mock_id` int(11) NOT NULL,
  `mock_question_id` int(11) NOT NULL,
  `user_answer` int(2) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `status` enum('answered','not answered') NOT NULL,
  `mark_earned` double(5,2) NOT NULL,
  `mark_deducted` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mock_sections`
--

CREATE TABLE `mock_sections` (
  `section_id` int(11) NOT NULL,
  `section_questions` int(11) NOT NULL,
  `mock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mock_sections`
--

INSERT INTO `mock_sections` (`section_id`, `section_questions`, `mock_id`) VALUES
(1, 5, 1),
(1, 5, 2),
(2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `option_e` text NOT NULL,
  `answer` int(2) NOT NULL,
  `explanation` text NOT NULL,
  `subject` varchar(200) NOT NULL,
  `topic_name` varchar(200) NOT NULL,
  `question_hindi` text NOT NULL,
  `option_a_hindi` text NOT NULL,
  `option_b_hindi` text NOT NULL,
  `option_c_hindi` text NOT NULL,
  `option_d_hindi` text NOT NULL,
  `option_e_hindi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `answer`, `explanation`, `subject`, `topic_name`, `question_hindi`, `option_a_hindi`, `option_b_hindi`, `option_c_hindi`, `option_d_hindi`, `option_e_hindi`) VALUES
(1, 'Protocols are', 'Agreements on how communication components and DTE', 'Logical communication channels used for transferri', 'Physical communication channels used for transferr', 'None of the above', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', ' प्रोटोकॉल हैं', 'संचार घटकों और डीटीई पर समझौते', 'स्थानांतरण के लिए उपयोग किए जाने वाले तार्किक संचार चैनल', 'स्थानांतरण के लिए उपयोग किए जाने वाले भौतिक संचार चैनल', 'उपर्युक्त में से कोई भी नहीं', ''),
(2, 'The method of communication in which transmission takes place in  both directions, but only one direction at a time is called', 'Simplex', 'Four wire circuit', 'Full Duplex', 'Half Duplex', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(3, 'Error detection at the data link level is achieved by', 'Bit Stuffing', 'Cyclic Redundancy Code', 'Hamming Code', 'Equalization', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(4, 'Which of the following is a wrong example of network layer?', 'Internet Protocol (IP) - ARPANET', 'X.25 Packet Level Protocol (PLP)-ISO', 'Source routing and domain naming-USENet', 'X.25 level 2-ISO', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(5, 'The topology with highest reliability is:', 'Bus topology', 'Star topology', 'Ring topology', 'Mesh topology', '', 4, 'Mess Topology is a network setup where each computer and network device is interconnected with one another, allowing for most transmissions to be distributed, even if one of the connections go down. This topology is not commonly used for most computer networks as it is difficult and expensive to have redundant connection to every computer. However, this topology is commonly used for wireless networks.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(6, '\"BAUD\" rate means', 'The number of bits transmitted per unit time.', 'The number of bytes transmitted per unit time.', 'The rate at which the signal changes.', 'None of the above', '', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(7, 'Start and stop bits are used in serial communication for', 'Error detection', 'Error correction', 'Synchronization', 'Slowing down the communication', '', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(8, 'Unmodulated signal coming from a transmitter is know as', 'Carrier signal', 'Baseband signal', 'Primary signal', 'None of these', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(9, 'How many Character per sec(7bits + 1parity) can be transmitted over a 2400 bps line if the transfer is synchronous (1 \"Start\" and 1 \"stop\" bit)?', '300', '240', '250', '275', '', 1, 'Start and stop bits are not needed in synchronous transfer of data. So, it is 2400/8=300.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(10, 'Which one of the following network uses dynamic or adaptive routing?', 'TYMNET', 'ARPANET', 'SNA(IBM\'s System Network Architechture)', 'None of these', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(11, 'The number of cross point needed for 10 lines in a cross point switch which is full duplex in nature and there are no self connection is', '100', '45', '50', '90', '', 2, 'As all lines are full-duplex and there are no self connections, only the cross points above the diagonals are needed. Hence formula for the number of cross points required is n(n-1)/2.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(12, 'A terminal multiplexer has six 1200 bps terminals and \'n\' 300bps terminals connected to it. The outgoing line is 9600bps. What is the maximum value of n?', '4', '16', '8', '28', '', 3, 'Since there are six 1200bps terminals, 6*1200 + n*300 =9600 by solving this, n=8.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(13, 'Maximum data rate of a channel for a noiseless 3-kHz binary channel is', '3000bps', '6000 bps', '1500 bps', 'None of these', '', 2, 'Maximum data rate = 2Hlog2V bps, where H is the bandwidth, V is the discrete levels. Here H is 3 kHz and V is 2.\n\nSo, data rate = 2*3000 log22 bps = 6000 bps.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(14, 'The ________ measures the number of lost or garbled messages as a fraction of the total sent in the sampling period.', 'Residual Error Rate.', 'Transfer Failure Probability.', 'Connection release failure probability.', 'Connection establish.', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(15, 'In session layer, during data transfer, the data stream responsible for the \"control\" purpose (i.e control of the session layer itself) is', 'Regular Data', 'Typed data', 'Capability Data', 'Expedited Data', '', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(16, 'A high speed communication equipment typically would not be needed for', 'E-mail', 'Transferring large volume of data', 'Supporting communication between nodes in a LAN', 'All of these', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(17, 'Which of the following ISO level is more closely related to the physical communications facilities?', 'Application', 'Session', 'Networking', 'Data Link', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(18, 'which of the following is not a field in the Ethernet Message packet?', 'Type', 'Data', 'Pin-code', 'Address', '', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(19, 'The Network topology that supports bi-directional links between each possible node is', 'Ring', 'Star', 'Tree', 'Mesh', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(20, 'In a broad Sense, a railway track is an example of', 'Simplex', 'Half Duplex', 'Full Duplex', 'All of these', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(21, 'Which network has connectivity range up to 10 meters?', 'LAN', 'PAN', 'MAN', 'WAN', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(22, 'For data communications to occur, the communicating devices must be part of a communication system made up of a combination of?', 'WAN and LAN', 'Hardware and software', 'Full duplex and half duplex', 'All of the above', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(23, 'Correct method for full duplex mode of communication is:', 'Both stations can transmit and receive data at the', 'One device can send other device can only accepts.', 'One device sends and other device receives and vic', 'None of these', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(24, 'Data communications system depends on four fundamental characteristics accuracy, delivery, jitter and', 'Receiver', 'Sender', 'Timeliness', 'Medium', '', 3, 'Data communications means the exchange of data between two devices via some form of transmission medium such as a wire cable. For data communications to occur, the communicating devices must be part of a communication system made up of a combination of hardware (physical equipment) and software (programs). \nThe effectiveness of a data communications system depends on four fundamental characteristics: delivery, accuracy, timeliness, and jitter.\n1. Delivery: The system must deliver data to the correct destination. Data must be received by the intended device or user and only by that device or user.\n2. Accuracy: The system must deliver the data accurately. Data that have been altered in transmission and left uncorrected are unusable.\n3. Timeliness: The system must deliver data in a timely manner. Data delivered late are useless. In the case of video and audio, timely delivery means delivering data as they are produced, in the same order that they are produced, and without significant delay. This kind of delivery is called real-time transmission.\n4. Jitter: Jitter refers to the variation in the packet arrival time. It is the uneven delay in the delivery of audio or video packets. For example, let us assume that video packets are sent every 3D ms. If some of the packets arrive with 3D-ms delay and others with 4D-ms delay, an uneven quality in the video is the result.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(25, 'A data communications system has:', '4 components', '5 components', '6 components', '7 components', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(26, '00 represents a pixel that pixel is known as :', 'Black pixel', 'Light gray', 'White pixel', 'Dark gray pixel', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(27, 'Select correct type of line configuration:', 'Multi-point', 'Single point', 'Link', 'Dedicated point', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(28, 'Select the wrong data communication system component:', 'Medium', 'Protocol', 'Receiver', 'Transits', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(29, 'Time required for a message to travel from one device to another is known as:', 'Transit time', 'Dialogue time', 'Response time', 'Wait time', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(30, 'If one link fails, only that link is affected. All other links remain active. Which topology does this?', 'Mesh topology', 'Star topology', 'Bus topology', 'Physical topology', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(31, 'OSI model means:', 'Open systems interconnection', 'Operating system interconnection', 'Open source interconnection', 'Operating source interconnection', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(32, 'Select the correct cable that transport signals in the form of light:', 'Twisted-Pair cable', 'Fiber optic cable', 'Coaxial Cable', 'Shielded Twisted Pair cable', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(33, 'Twisted pair wires, coaxial cable, optical fiber cables are the examples of:', 'Wired Media', 'Wireless Media', 'Both A & B', 'None of these', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(34, 'Which of the followings is used in communications is referred to as unshielded twisted-pair (UTP)?', 'Coaxial cable', 'Fiber-optic cable', 'Twisted-pair cable', 'None of these', '', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(35, 'What is Cladding?', 'Cables with shield', 'Coxial Cable', 'A typical optical fiber consists of a very narrow', 'None of these', '', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(36, 'Which network is a cross between circuits switched network and a data-gram network?', 'Circuit-switched network', 'Virtual-circuit network', 'Virtual-circuit identifier', 'None of these', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(37, 'Select the cable that uses copper conductor, accept and transport signals in the form of electric current?', 'Fiber-optic cable', 'Metallic cable', 'Twisted pair cable', 'All of the above', '', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(38, 'Number of Unguided Media is:', '6', '5', '4', '3', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(39, 'Switching at the network layer in the Internet uses the datagram approach to:', 'Message switching', 'Circuit switching', 'IP switching', 'Packet switching', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(40, 'Which is also known as a connectionless protocol for a packet-switching network that uses the Datagram approach?', 'IPV5', 'IPV4', 'IPV6', 'None of these', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(41, 'Which switch is a multistage switch with micro switches at each stage that route the packets based on the output port represented as a binary string?', 'Banyan switch', 'Crossbar switch', 'Multistage crossbar', 'Packet switch', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(42, 'How many digits of the DNIC (Data Network Identification Code) identify the country?', 'first three', 'first four', 'first five', 'first six', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(43, 'A station in a network forwards incoming packets by placing them on its shortest output queue. What routing algorithm is being used?', 'hot potato routing', 'flooding', 'static routing', 'delta routing', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(44, 'The probability that a single bit will be in error on a typical public telephone line using 4800 bps modem is 10 to the power -3. If no error detection mechanism is used, the residual error rate for a communication line using 9-bit frames is approximately equal to', '0.003', '0.009', '0.991', '0.999', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(45, 'Frames from one LAN can be transmitted to another LAN via the device', 'Router', 'Bridge', 'Repeater', 'Modem', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(46, 'Which of the following condition is used to transmit two packets over a medium at the same time?', 'Contention', 'Collision', 'Synchronous', 'Asynchronous', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(47, 'You have a class A network address 10.0.0.0 with 40 subnets, but are required to add 60 new subnets very soon. You would like to still allow for the largest possible number of host IDs per subnet. Which subnet mask should you assign?', '255.240.0.0', '255.248.0.0', '255.252.0.0', '255.254.0.0', '255.255.255.255', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(48, 'What are the most commonly used transmission speeds in BPS used in data communication?', '300', '1200', '2400', '9600', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(49, 'What is the default subnet mask for a class C network?', '127.0.0.1', '255.0.0.0', '255.255.0.0', '255.255.255.0', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(50, 'Which of the following is used for modulation and demodulation?', 'modem', 'protocols', 'gateway', 'multiplexer', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(51, 'Which of the following is not a disadvantage of wireless LAN?', 'Slower data transmission', 'higher error rate', 'interference of transmissions from different computers', 'All of the above', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(52, 'The Internet Control Message Protocol (ICMP)', 'allows gateways to send error a control messages to other gateways or hosts', 'provides communication between the Internet Protocol Software on one machine and the Internet Protocol Software on another', 'reports error conditions to the original source, the source must relate errors to individual application programs and take action to correct the problem', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(53, 'Your company has a LAN in its downtown office and has now set up a LAN in the manufacturing plant in the suburbs. To enable everyone to share data and resources between the two LANs, what type of device(s) are needed to connect them? Choose the most correct answer.', 'Modem', 'Cable', 'Hub', 'Router', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(54, 'The term \'duplex\' refers to the ability of the data receiving stations to echo back a confirming message to the sender. In full duplex data transmission, both the sender and the receiver', 'cannot talk at once', 'can    receive    and    send    data simultaneously', 'can send or receive data one at a time', 'can do one way data transmission only', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(55, 'How many hosts are attached to each of the local area networks at your site?', '128', '254', '256', '64', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(56, 'Which of the following technique is used for fragment?', 'a technique used in best-effort delivery systems to avoid endlessly looping packets', 'a technique used by protocols in which a lower level protocol accepts a message from a higher level protocol and places it in the data portion of the low level frame', 'one of the pieces that results when an IP gateway divides an IP datagram into smaller pieces for transmission across a network that cannot handle the original datagram size', 'All of the above', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(57, 'Contention is', 'One or more conductors that serve as a common connection for a related group of devices', 'a continuous frequency capable of being modulated or impressed with a second signal', 'the condition when two or more stations attempt to use the same channel at the same time', 'a collection of interconnected functional units that provides a data   communications   service among stations attached to the network', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(58, 'Avalanche photodiode receivers can detect hits of transmitted data by receiving', '100 photons', '200 photons', '300 photons', '400 photons', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(59, 'Satellite-Switched Time-Division Multiple Access (SS/TDMA) is', 'the method of determining which device has access to the transmission medium at any time.', 'a medium access control technique for multiple access transmission media', 'a form of TDMA in which circuit switching is used to dynamically change the channel assignments', 'All of the above', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(60, 'When you ping the loopback address, a packet is sent where?', 'On the network', 'Down through the layers of the IP architecture and then up the layers again', 'Across the wire', 'through the loopback dongle', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(61, 'Which of the following TCP/IP protocol is used for transferring electronic mail messages from one machine to another?', 'FTP', 'SNMP', 'SMTP', 'RPC', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(62, 'Which of the following device is used to connect two systems, especially if the systems use different protocols?', 'hub', 'bridge', 'gateway', 'repeater', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(63, 'The synchronous modems are more costly than the asynchronous modems because', 'they produce large volume of data', 'they contain clock recovery circuits', 'they transmit the data with stop and start bits.', 'they operate with a larger bandwidth', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(64, 'A distributed network configuration in which all  data/information pass through a central computer is', 'bus network', 'star network', 'ring network', 'Point-to-point network', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(65, 'Which of the following TCP/IP protocol allows an application program on one machine to send a datagram to an application program on another machine?', 'UDP', 'VMTP', 'X.25', 'SMTP', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(66, 'A remote batch-processing operation in which data is solely input to a central computer would require a:', 'telegraph line', 'simplex lines', 'mixedband channel', 'All the above', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(67, 'ICMP (Internet Control Message Protocol) is', 'a TCP/IP protocol used to dynamically bind a high level IP Address to a low-level physical hardware address', 'a TCP/IP high level protocol for transferring files from one machine to another', 'a protocol used to monitor computers', 'a protocol that handles error and control messages', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(68, 'If you get both local and remote echoes, every character you type will appear on the screen', 'once', 'twice', 'three times', 'never', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(69, 'What part of 192.168.10.51 is the Network ID, assuming a default subnet mask?', '192', '192.168.10', '0.0.0.5', '51', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(70, 'The slowest transmission speeds are those of', 'twisted-pair wire', 'coaxial cable', 'fiber-optic cable', 'microwaves', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(71, 'A noiseless 3 KHz Channel transmits bits with binary level signals. What is the maximum data rate?', '3 Kbps', '6 Kbps', '12 Kbps', '24 Kbps.', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(72, 'Carrier is', 'One or more conductors that serve as a common connection for a related group of devices', 'a continuous frequency capable of being modulated or impressed with a second signal', 'the condition when two or more sections attempt to use the same channel at the same time', 'a collection of interconnected functional units that provides a data communications service among stations attached to the network', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(73, 'What can greatly reduce TCP/IP configuration problems?', 'WINS Server', 'WINS Proxy', 'DHCP Server', 'PDC', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(74, 'In CRC there is no error if the remainder at the receiver is _____.', 'equal to the remainder at the sender', 'zero', 'nonzero', 'the quotient at the sender', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(75, 'Which of the following statements is correct for the use of packet switching?', 'the subdivision of information into individually addressed packets in conjunction with alternative routing arrangement enabled the transmission path to be altered in the event of congestion or individ', 'the employment of additional intelligence within the network enabled more sophisticated error control and link control procedures to be applied', 'by employing wide bandwidth circuits for the trunk networks substantial economies through extensive sharing of capacity could be achieved.', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(76, 'A front-end processor is', 'a user computer system', 'a processor in a large-scale computer that executes operating system instructions', 'a minicomputer that relieves main-frame computers at a computer centre of communications control functions', 'preliminary processor of batch jobs.', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(77, 'What is the port number for NNTP?', '119', '80', '79', '70', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(78, 'Eight stations are competing for the use of a shared channel using the \'Adaptive tree Walk Protocol\'. If the stations 7 and 8 are suddenly become ready at once, how many bit slots are needed to resolve the contention?', '7 slots', '5 slots', '10 slots', '14 slots', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(79, 'Usually, it takes 10-bits to represent one character. How many characters can be transmitted at a speed of 1200 BPS?', '10', '12', '120', '1200', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(80, 'To connect a computer with a device in the same room, you might be likely to use', 'a coaxial cable', 'a dedicated line', 'a ground station', 'All of the above', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(81, 'Internet-like networks within an enterprise.', 'Intranets', 'Switching alternating', 'Inter organizational networks', 'Extranets', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(82, 'How many bits internet address is assigned to each host on a TCP/IP internet which is used in all communications with the host?', '16 - bits', '32 - bits', '48 - bits', '64 - bits', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(83, 'With an IP address of 100, you currently have 80 subnets. What subnet mask should you use to maximize the number of available hosts?', '192', '224', '240', '248', '252', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(84, 'Which of the following types of channels moves data relatively slowly?', 'wideband channel', 'voiceband channel', 'narrowband channel', 'broadband channel', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(85, 'Which of the following is required to communicate between two computers?', 'communications software', 'protocol', 'communications hardware', 'access to transmission medium', 'All of the above', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(86, 'Which of the following does not allow multiple users or devices to share one communications line?', 'doubleplexer', 'multipplexer', 'concentrator', 'controller', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(87, 'The geostationary satellite used for communication systems', 'rotates with the earth', 'remains stationary relative to the earth', 'is positioned over equator', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(88, 'Telecommunication networks frequently interconnect an organization with its customers and suppliers. Select the best fit for answer:', 'Bandwidth alternatives', 'Switching alternating', 'Inter organizational networks', 'Extranets', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(89, 'The packets switching concept was first proposed', 'in the late 1980s for the Defense Ministry of US.', 'in the early 1960s for military communication systems, mainly to handle speech', 'in the late 1950s for Defense Ministry of US', 'All of the above', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(90, 'The _____ houses the switches in token ring.', 'transceiver', 'nine-pin connector', 'MAU', 'NIC', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(91, 'What device separates a single network into two segments but lets the two segments appear as one to higher protocols?', 'Switch', 'Bridge', 'Gateway', 'Router', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(92, 'Which of the following refers to the terms \"residual error rate\"?', 'the number of bit errors per twenty four hours of continuous operation on an asynchronous line', 'The probability that one or more errors will be undetected when an error detection scheme is used', 'the probability that one or more errors will be detected when an error detection mechanism is used', 'signal to noise ratio divided by the ratio of energy per bit to noise per hertz', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(93, 'Which of the following summation operations is performed on the bits to check an error-detecting code?', 'Codec', 'Coder-decoder', 'Checksum', 'Attenuation', 'Broadband and baseband refer to the different frequencies at which infrared operates then transmitting signals in certain conditions', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(94, 'The research and development department at your office has been experimenting with different technologies to help improve the performance of the network. One group has been examining the use of a broadband network versus a based band network. Select the correct statement about broadband and baseband.', 'Broadband networks carry several channels on a single cable, whereas in a baseband network several cables carry one channel', 'Baseband networks carry a single channel on a single cable, whereas broadband networks carry several channels on a single cable', 'Baseband refers to local area networks, and broadband refers to wide area networks.', 'Baseband operates at a standard bit rate, whereas broadband may operate at different rates as needed', 'Broadband and baseband refer to the different frequencies at which infrared operates then transmitting signals in certain conditions', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(95, 'An error-detecting code inserted as a field  in  a  block  of data  to  be transmitted is known as', 'Frame check sequence', 'Error detecting code', 'Checksum', 'flow control', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(96, 'The cheapest modems can transmit', '300 bits per second', '1,200 bits per second', '2,400 bits per second', '4,800 bits per second', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(97, 'Computers cannot communicate with each other directly over telephone lines because they use digital pulses whereas telephone lines use analog sound frequencies. What is the name of the device which permits digital to analog conversion at the start of a long distance transmission?', 'Interface', 'Modem', 'Attenuation', 'Teleprocessor', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(98, 'What is the usual number of bits transmitted simultaneously in parallel data transmission used by microcomputers?', '16', '9', '8', '4', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(99, 'The receive equalizer reduces delay distortions using a', 'tapped delay lines', 'gearshift', 'descrambler', 'difference engine', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(100, 'Four routers have to be interconnected in a point-to-point Network. Each pair of root us may connected by a high-speed line, a medium speed line or a low speed line. Find the total number of topologies.', '12', '81', '48', '729', 'ARP.EXE', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(101, 'A network consists of eight NT servers. You are planning to move servers to different segments of your network, what utility should be used at each server to determine which server generates the most traffic?', 'NBTSTAT', 'NETSTAT.EXE', 'Performance Monitor', 'Network Monitor', 'ARP.EXE', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(102, 'Sending a file from your personal computer\'s primary memory or disk to another computer is called', 'uploading', 'downloading', 'logging on', 'hang on', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(103, 'What is the name of the software package that allows people to send electronic mail along a network of computers and workstations?', 'Memory resident package', 'Project management package', 'Data communication package', 'Electronic mail package', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(104, 'The communication mode that supports two-way traffic but only one direction at a time is', 'simplex', 'duplex', 'half duplex', 'multiplex', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(105, 'HMP (Host Monitoring Protocol) is:', 'a TCP/IP protocol used to dynamically bind a high level IP Address to a low-level physical hardware address', 'a TCP/IP high level protocol for transferring files from one machine to another.', 'a protocol used to monitor computers', 'a protocol that handles error and control messages', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(106, 'Which of the following is a voiceband channel?', 'Telephone line', 'Telegraph line', 'Coaxial cable', 'Microwave systems', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(107, 'A 8-Mbps token ring has a token holding timer value of 10 msec. What is the longest frame (assume header bits are negligible) that can be sent on this ring?', '8000 B frame', '80,000 B frame', '8 x 105 bit frame', '10,000 B frame', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(108, 'Data are sent over pin _____ of the EIA-232 interface.', '2', '3', '4', 'All of the above', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(109, 'To connect a computer with a device in the same room, you might be likely to use', 'a coaxial cable', 'a dedicated line', 'a ground station', 'All of the above', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(110, 'Demodulation is a process of', 'converting analog to digital signals', 'converting digital to analog signals', 'multiplexing various signals into one high speed line signals', 'performing data description.', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(111, 'Internet-like networks between a company and its business partners. Select the best fit for answer:', 'Bandwidth alternatives', 'Switching alternating', 'Inter organizational networks', 'Extranets', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(112, 'An example of an analog communication method is', 'laser beam', 'microwave', 'voice grade telephone line', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(113, 'Which of the following layer protocols are responsible for user and the application programme support such as passwords, resource sharing, file transfer and network management?', 'Layer 7 protocols', 'Layer 6 protocols', 'Layer 5 protocols', 'Layer 4 protocols', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(114, 'What frequency range is used for FM radio transmission?', 'Very Low Frequency : 3 kHz to 30. kHz', 'Low Frequency : 30 kHz to 300 kHz', 'High Frequency : 3 MHz to 30 MHz', 'Very High Frequency : 30 MHz to 300 MHz', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(115, 'Transmission of computerised data from one location to another is called', 'data transfer', 'data flow', 'data communication', 'data management', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(116, 'Compared to analog signals, digital signals', 'allow faster transmission', 'are more accurate', 'both A and B', 'All of the above', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(117, 'FDDI is a', 'ring network', 'star network', 'mesh network', 'bus based network', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(118, 'An anticipated result from multiprogramming operations is:', 'reduced computer idle time', 'the handling of more jobs', 'better scheduling of work', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(119, 'A central computer surrounded by one or more satellite computers is called a', 'bus network', 'ring network', 'star network', 'All of the above', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(120, 'If delays are recorded as 10 bit numbers in a 50 router network, and delay vectors are exchanged twice a second, how much bandwidth per fill duplex line is occupied by the distributed routing algorithm?', '500 bps', '1500 bps', '5 bps', '1000 bps', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(121, 'HOSTS file entries are limited to how many characters?', '8', '255', '500', 'Unlimited', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(122, 'Demodulation is the process of', 'converting digital signals to analog signals', 'converting analog signals to digital signals', 'combining many low speed channels  into  one  high  speed channel', 'dividing the high-speed signals into frequency bands', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(123, 'Which of the following statement is incorrect?', 'The Addresses Resolution Protocol, ARP, allows a host to find the physical address of a target host on the same physical network, given only the target IP address.', 'The sender\'s IP - to- physical address binding is included in every ARP broadcast', 'receivers update the IP-to-Physical address binding information in their cache before processing an ARP packet.', 'ARP is a low-level protocol that hides the underlying network physical addressing, permitting us to assign IP-addresses of our choice to every machine.', 'All of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(124, 'You are working with a network that has the network ID 192.168.10.0. What subnet should you use that supports up to 25 hosts and a maximum number of subnets?', '255.255.255.192', '255.255.255.224', '255.255.255.240', '255.255.255.248', '255.255.255.252', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(125, 'Which of the following best illustrates the default subnet mask for a class A,B, and C Network?', '0.0.0.0, 0.0.0.1, 0.0.1.1', '255.255.255.0, 255.255.0.0, 255.0.0.0', '255.0.0.0, 255.255.0.0, 255.255.255.0', '255.255.0.0, 255.255.255.0, 255.255.255.255', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(126, 'Modulation is the process of', 'converting analog signals to digital signals', 'converting digital signals to analog signals', 'Multiplexing various signals into high speed line signals', 'performing data encryption.', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(127, 'Devices interconnected by the LAN should include', 'Computers and terminals', 'mass storage device, printers and plotters', 'bridges and gateways', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(128, 'What are the data transmission channels available for carrying data from one location to another?', 'Narrowband', 'Voiceband', 'Broadband', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(129, 'On a class B network, how many hosts are available at each site with a subnet mask of 248?', '16382', '8190', '4094', '2046', '1022', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(130, 'Which of the following technique is used for encapsulation?', 'a technique used in best-effort delivery systems to avoid endlessly looping packets.', 'a technique used by protocols in which a lower level protocol accepts a message from a higher level protocol and places it in the data portion of the low level frame.', 'One of the pieces that results when an IP gateway divides an IP datagram into smaller pieces for transmission across a network that cannot handle the original datagram size', 'All of the above', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(131, 'You are working with three networks that have the network IDs 192.168.5.0, 192.168.6.0, and 192.168.7.0. What subnet mask can you use to combine these addresses into one?', '255.255.252.0', '225.255.254.0', '255.255.255.240', '255.255.255.252', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(132, 'With an IP address set starting with 150, you currently have six offices that you are treating as subnets. Plans are in place to open 10 more offices before the end of the year. What subnet mask should you use to satisfy the needed number of subnets and maximize the number of hosts available at each site?', '192', '224', '240', '248', '252', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(133, 'A machine that connects to two or more electronic mail systems and transfers mail messages among them is known as', 'Gateways', 'mail gateway', 'bridges', 'User Agent', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(134, 'If digital data rate of 9600 bps is encoded using 8-level phase shift keying (PSK) method, the modulation rate is', '1200 bands', '3200 bands', '4800 bands', '9600 bands', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(135, 'Error detection at a data link level is achieved by', 'bit stuffing', 'cyclic redundancy codes', 'Hamming codes', 'equalization', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(136, 'When the computer provides the manager with a multiple choice of possible answers, the prompting technique is', 'question and answer', 'form filling', 'open-ended question', 'menu selection', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(137, 'Which network topology is considered passive?', 'Cross', 'Ring', 'Star', 'Mesh', 'Bus', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0');
INSERT INTO `questions` (`question_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `answer`, `explanation`, `subject`, `topic_name`, `question_hindi`, `option_a_hindi`, `option_b_hindi`, `option_c_hindi`, `option_d_hindi`, `option_e_hindi`) VALUES
(138, 'If a firm wanted to transmit data from 1,000 punched cards to a remote computer, they would use a(n)', 'POS terminal', 'data collection terminal', 'batch processing terminal', 'intelligent terminal', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(139, 'Which address is the loopback address?', '0.0.0.1', '127.0.0.0', '127.0.0.1', '255.255.255.255', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(140, 'Error rate is', 'an error-detecting code based on a summation operation performed on the bits to be checked.', 'a check bit appended to an array of binary digits to make the sum of all the binary digits.', 'a code in which each expression conforms to specific rules of construction, so that if certain errors occur in an expression, the resulting expression will not conform to the rules of construction and', 'the ratio of the number of data units in error to the total number of data units', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(141, 'Intranets and extranets can use their network fire walls and other security features to establish secure Internet links within an enterprise or with its trading partners. Select the best fit for answer:', 'Network Server', 'Virtual Private Network', 'Network operating system', 'OSI', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(142, 'Modem is used in data transmission. When was it invented and in which country?', '1963, USA', '1965, Germany', '1950, USA', '1950, Japan', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(143, 'Which of the following technique is used for Time-To-Line (TTL)?', 'a technique used in best-effort delivery system to avoid endlessly looping packets.', 'a technique used by protocols in which a lower level protocol accepts a message from a higher level protocol and places it in the data portion of the low level frame', 'One of the pieces that results when an IP gateway divides an IP datagram into smaller pieces for transmission across a network that cannot handle the original datagram size.', 'All of the above', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(144, 'Communication network is', 'one or more conductors that serve as a common connection for a related group of devices', 'a continuous frequency capable of being modulated or impressed with a second signal', 'the condition with two or more stations attempt to use the same channel at the same time', 'a collection of interconnected functional units that provides a data communications service among stations attached to the network', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(145, 'Which of the following is an advantage to using fiber optics data transmission?', 'resistance to data theft', 'fast data transmission rate', 'low noise level', 'few transmission errors', 'All of the above', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(146, 'Which of the following statement is incorrect?', 'if a host moves from one network to another, its IP address must change', 'routing uses the network portion of the IP address, the path taken by packets travelling to a host with multiple IP addresses depends on the address used.', 'IP addresses encode both a network and a host on that network, they do not specify an individual machine, but a connection to a network.', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(147, 'Bandlimited signal is', 'transmission of signals without modulation', 'a signal all of whose energy is contained within a finite frequency range', 'simultaneous transmission of data to a number of stations', 'All of the above', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(148, 'Computers in a LAN can be interconnected by radio and infrared technologies.', 'Wireless LANs', 'Network Topologies', 'Multiplexer', 'Modem', '255.255.255.255', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(149, 'You have a network ID of 134.57.0.0 and you need to divide it into multiple subnets in which at least 600 host IDs for each subnet are available. You desire to have the largest amount of subnets available. Which subnet mask should you assign?', '255.255.224.0', '255.255.240.0', '255.255.248.0', '255.255.255.0', '255.255.255.255', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(150, 'How many digits of the Network User Address are known as the DNIC (Data Network Identification Code)?', 'first three', 'first four', 'first five', 'first seven', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(151, 'Which of the following is the address of the router?', 'The IP address', 'The TCP address', 'The subnet mask', 'The default gateway', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(152, 'Thorough planning must take place when setting up an 802.3 network. A maximum number of segments can separate any two nodes on the network. What is the maximum number of segments allowed between two nodes?', 'Five', 'Two', 'Four', 'Six', 'Three', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(153, 'A devices that links two homogeneous packet-broadcast local networks, is', 'hub', 'bridge', 'repeater', 'gateway', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(154, 'Identify the odd term amongst the following group:', 'Coaxial cable', 'Optical fibre', 'Twisted pair wire', 'Microwaves', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(155, 'Which of the following divides the high speed signal into frequency bands?', 't-switch', 'modem', 'frequency-division multiplexer', 'time-division multiplexer', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(156, 'What is the first octet range for a class C IP address?', '192 - 255', '192 - 223', '192 - 226', '128 - 191', '1 - 126', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(157, 'Which utility is useful for finding the local host name?', 'NBTSTAT', 'Netstat', 'PING', 'Hostname', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(158, 'Which of the following conditions is used to transmit two packets over a medium at the same time?', 'Contention', 'Collision', 'Synchronous', 'Asynchronous', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(159, 'The slowest transmission speeds are those of', 'twisted-pair wire', 'coaxial cable', 'fiber-optic cable', 'microwaves', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(160, 'Distributed Queue Dual Bus is a standard for', 'LAN', 'MAN', 'WAN', 'Wireless LAN', 'LAN and MAN', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(161, 'A teleprocessing system may consist of', 'user systems', 'communications systems', 'computer center systems', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(162, 'If the ASCII character G is sent and the character D is received, what type of error is this?', 'single-bit', 'multiple-bit', 'burst', 'recoverable', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(163, 'Which layer of OSI determines the interface of the system with the user?', 'Network', 'Application', 'Data-link', 'Session', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(164, 'The transfer of data from a CPU to peripheral devices of a computer is achieved through', 'modems', 'computer ports', 'interfaces', 'buffer memory', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(165, 'What is the number of separate protocol layers at the serial interface gateway specified by the X.25 standard?', '4', '2', '6', '3', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(166, 'Many data communication networks have been established which provide a wealth of on-demand information services to people at home. What is the name of the system which provides an interactive, graphics-rich service that permits user to select what they want?', 'Teletex system', 'Fax system', 'Videotex system', 'Microwave system', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(167, 'Which of the following statements is correct?', 'Terminal section of a synchronous modem contains the scrambler', 'Receiver section of a synchronous modem contains the scrambler', 'Transmission section of a synchronous modem contains the scrambler', 'Control section of a synchronous modem contains the scrambler', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(168, 'Which of the following characteristic(s) is/are suited to the PSS applications?', 'bursty traffic and low communications intensity', 'widely dispersed terminals and access to international packets switched services', 'Multiple remote host or applications accessed by a single local access circuit terminal and circuit', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(169, 'Because the configuration infor-mation for a DHCP client is received dynamically, you must use which utility to read the current configuration to verify the settings?', 'PING', 'TRACERT', 'ARP', 'IPCONFIG', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(170, 'Which of the following is separated by a subnet mask?', 'DHCP scopes', 'Network ID and host ID', 'Domains', 'Subnets', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(171, 'The signal to noise ratio for a voice grade line is 30.1 dB (decibels) or a power ratio of 1023:1. The maximum achievable data rate on this line whose spectrum ranges from 300 Hz to 4300 Hz is', '6200 bps', '9600 bps', '34000 bps', '31000 bps', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(172, 'TCP is:', 'Operates at the Data Link layer', 'Connection orientated and unreliable', 'Connection orientated and reliable', 'Connectionless and unreliable', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(173, 'An encyclopedic database', 'is an information utility that specializes in storing and searching information', 'is generally free', 'is easy for beginners to use', 'All of the above', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(174, 'Which of the following statements is correct?', 'Protocol converters are the same as multiplexers', 'Protocol converters are the same as TDMs', 'Protocol converters are usually not operated in pairs.', 'Protocol converters are usually operated in', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(175, 'The dialogue techniques for terminal use do not include', 'questions and answers', 'open-ended questions', 'form fillings', 'menu display', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(176, 'You have a network ID of 192.168.10.0 and require at least 25 host IDs for each subnet, with the largest amount of subnets available. Which subnet mask should you assign?', '255.255.255.192', '255.255.255.224', '255.255.255.240', '255.255.255.248', '255.255.255.255', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(177, 'The encoding method specified in the EIA-232 standard is _____.', 'NRZ-I', 'NRZ-L', 'Manchester', 'Differential Manchester', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(178, 'Examples are packet switching using frame relay, and cell switching using ATM technologies. Select the best fit for answer:', 'Bandwidth alternatives', 'Switching alternating', 'Inter organizational networks', 'Extranets', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(179, 'The physical layer, in reference to the OSI model, defines', 'data link procedures that provide for the exchange of data via frames that can be sent and received', 'the interface between the X.25 network and packet mode device', 'the virtual circuit interface to packet-switched service', 'All of the above', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(180, 'A required characteristic of an online real-time system is:', 'more than one CPU', 'offline batch processing', 'no delay in processing', 'All of the above', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(181, 'How many class A, B, and C network IDs can exist?', '2113658', '16382', '126', '128', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(182, 'The transmission signal coding method of TI carrier is called', 'Bipolar', 'NRZ', 'Manchester', 'Binary', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(183, 'Which of the following statement is correct?', 'Buffering is the process of temporarily storing the data to allow for small variation in device speeds', 'Buffering is a method to reduce cross-talks', 'Buffering is a method to reduce the routing overhead', 'Buffering is storage of data within the transmitting medium until the receiver is ready to receive', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(184, 'You are working with a network that has the network ID 192.168.10.0 and require nine subsets for your company and the maximum number of hosts. What subnet mask should you use?', '255.255.255.192', '255.255.255.224', '255.255.255.240', '255.255.255.248', '255.255.255.252', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(185, 'Messages from one computer terminal can be sent to another by using data networks. The message to be sent is converted to an electronic digital signal, transmitted via a cable, telephone or satellite and then converted back again at the receiving end. What is this system of sending messages called?', 'Paperless office', 'Electronic mail', 'Global network', 'Electronic newspaper', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(186, 'HDLC (High-level Data Link Control) is', 'a method of determining which device has access to the transmission medium at any time', 'a method access control technique for multiple-access transmission media', 'a very common bit-oriented data link protocol issued by ISO.', 'network access standard for connecting stations to a circuit-switched network', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(187, 'You are working with a network that has the network ID 192.168.10.0. What subnet should you use that supports four subnets and a maximum number of hosts?', '255.255.255.192', '255.255.255.224', '255.255.255.240', '255.255.255.248', '255.255.255.252', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(188, 'Establishing a virtual connection is functionally equivalent to', 'Connecting as virtual memory', 'Physically connecting a DTE and DCE', 'Placing a telephone call prior to a conversation', 'Placing a modem prior to a conversation', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(189, 'The first step in troubleshooting many problems is to verify which of the following?', 'The subnet mask is valid', 'TCP/IP is installed correctly on the client', 'The WINS server is running', 'The BDC is operable', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(190, 'You are working with a network that is 172.16.0.0 and would like to have the maximum number of hosts per subnet. This assumes support for eight subnets. What subnet mask should you use?', '255.255.192.0', '255.255.224.0', '255.255.240.0', '255.255.248.0', '255.255.255.0', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(191, 'Which of the following files is used for NetBIOS name resolution?', 'HOSTS', 'LMHOSTS', 'ARP', 'FQDN', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(192, 'What protocol is used between E-Mail servers?', 'FTP', 'SMTP', 'SNMP', 'POP3', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(193, 'If you configure the TCP/IP address and other TCP/IP parameters manually, you can always verify the configuration through which of the following? Select the best answer.', 'Network Properties dialog box', 'Server Services dialog box', 'DHCPINFO command-line utility', 'Advanced Properties tab of TCP/ IP Info.', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(194, 'In a PC to telephone hookup for long distance communication, modem is connected between the telephone line and', 'PC', 'synchronous port', 'crossover cable', 'asynchronous port', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(195, 'Which of the following communications service provides message preparation and transmission facilities?', 'Teletex', 'Teletext', 'x400', 'Fax', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(196, 'Four bits are used for packet sequence numbering in a sliding window protocol used in a computer network. What is the maximum window size?', '4', '8', '15', '16', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(197, 'A hard copy would be prepared on a', 'typewriter terminal', 'line printer', 'plotter', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(198, 'Which of the following device copies electrical signals from one Ethernet to another?', 'bridge', 'repeater', 'hub', 'passive hub', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(199, 'Stephanie is in charge of a small network and wants to make it simple but secure. The users want to have full control over their data and still be able to share data with the rest of the office. The networking knowledge of the office staff is basic. Which network(s) would be the best for Stephanie to set up?', 'Peer-to-peer', 'Master domain', 'Server-based', 'WAN', 'Share-level', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(200, 'When UPC is used, the price of the item is located', 'on the item', 'on the item and on the shelf', 'in computer storage', 'on the shelf and in computer storage', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(201, 'Error control is needed at the transport layer because of potential errors occurring _____.', 'from transmission line noise', 'in routers', 'from out-of-sequence delivery', 'from packet losses.', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(202, 'The transport layer  protocol is connectionless.', 'NVT', 'FTP', 'TCP', 'UDP', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(203, 'The fundamental requirements of private-to-public network interconnection methods which need to be provided in gateways is/are', 'universal accessibility for private network Data Terminal Equipment (DTE)', 'adequate cost control mechanisms for administration of the private networks', 'to assign address to private network DTEs', 'A and B both', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(204, 'Communication between computers is almost always', 'serial', 'parallel', 'series parallel', 'direct', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(205, 'Which of the following is considered a broadband communications channel?', 'coaxial cable', 'fiber optic cable', 'microwave circuits', 'satellites systems', 'All of the above', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(206, 'Data link layer retransmits the damaged frames in most networks. If the probability of a frame\'s being damaged is p, what is the mean number of transmissions required to send a frame if acknowledgements are never lost.', 'P I (K +  1)', 'KIK (1 + F)', '1/ (1    - F)', 'K I (K - P)', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(207, 'Which of the following characteristics is not true of NetBEUI?', 'Highly-customizable', 'Routable', 'Little configuration required', 'Fast for small networks to Self-tuning', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(208, 'The difference between a multiplexer and a statistical multiplexer is', 'Statistical multiplexers need buffers while multiplexers do not need buffers', 'Multiplexer use X.25 protocol, while statistical multiplexers use the Aloha protocol', 'Multiplexers often waste the output link capacity while statistical multiplexers optimize its use', 'Multiplexers use Time Division Multiplexing (TDM) while statistical multiplexers use Frequency Division Multiplexing (FDM)', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(209, 'You are trying to decide which type of network you will use at your office, and you want the type that will provide communication and avoid collisions on the cable. Which of the following is the best choice?', 'Token-Ring', 'CSMA/CD', 'Ethernet', 'CSMA/CA', 'ARCnet', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(210, 'Which of the following network access standard is used for connecting stations to a packet-switched network?', 'X.3', 'X.21', 'X.25', 'X.75', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(211, 'Interconnected networks need communication processors such as switches, routers, hubs, and gateways. Select the best fit for answer:', 'TCP/IP', 'Protocol', 'Open Systems', 'Internetwork processor', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(212, 'A decrease in magnitude of current, voltage, a power of a signal in transmission between points, is known as', 'Attenuation', 'Amplitude', 'Aloha', 'Carrier', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(213, 'The term \"remote job entry\" relates to', 'batch processing', 'realtime processing', 'transaction processing', 'distributed processing', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(214, 'Which of the following performs modulation and demodulation?', 'fiber optic', 'satellite', 'coaxial cable', 'modem', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(215, 'Data communications monitors available on the software market include', 'ENVIRON/1', 'TOTAL', 'BPL', 'Telenet', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(216, 'Which of the following statement is correct?', 'A spin stabilized satellite used solar cells mounted on a cylinder body that continuously rotates so that 40 a time and it also uses gyroscopic action of a spinning satellite to maintain its orientati', 'A spin stabilized satellite uses solar panels whose cells are continually oriented toward the sun', 'Satellite transponders use lower frequency reception of radiation from earth stations and higher frequency for transmission to earth stations.', 'satellite transponders use a single frequency for reception and transmission from one point on earth to another', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(217, 'What is the default subnet mask for a class A network?', '127.0.0.1', '255.0.0.0', '255.255.255.0.0', '255.255.255.0', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(218, 'When using the loopback address, if TCP/IP is installed correctly, when should you receive a response?', 'Immediately', 'Only if the address fails', 'After the next host comes online', 'Within two minutes', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(219, 'Which of the following statement is correct?', 'Satellite transponders contain a receiver and transmitter designed to relay microwave transmissions from one point on earth to another.', 'Satellite transponders contain a device that echos the radiation without change from one point on earth to another.', 'Satellite transponder contains devices that transform the message sent from one location on earth to a different code for transmission to another location.', 'Satellite transponders use lower frequency reception of radiation from earth stations and higher frequency for transmission to earth stations', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(220, 'The modern enterprise is interconnected internally and externally by the Internet, intranets, and other networks. Select the best fit for answer:', 'Internetworked enterprise', 'Information super highway', 'Business applications of telecommunications', 'Client/Server networks', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(221, 'The data communication support should include, but is not restricted to', 'file transfer and transaction processing', 'file and database access', 'terminal support, electronic mail and voice grams.', 'All of the above', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(222, 'MAC is', 'a method of determining which device has access to the transmission medium at any time', 'a method access control technique or multiple-access transmission media', 'a very common bit-oriented data link protocol issued to ISO.', 'network access standard for connecting stations to a circuit-switched network', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(223, 'What is the name of the device that converts computer output into a form that can be transmitted over a telephone line?', 'Teleport', 'Modem', 'Multiplexer', 'Concentrator', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(224, 'You are working with a network that has the network ID 172.16.0.0, and you require 25 subnets for your company and an additional 30 for the company that will merge with you within a month. Each network will contain approximately 600 nodes. What subnet mask should you assign?', '255.255.192.0', '255.255.224.0', '255.255.240.0', '255,255.248.0', '255.255.252.0', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(225, 'Which application allows a user to access   and   change remote  files without actual transfer?', 'TELNET', 'NFS', 'FTP', 'DNS', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(226, 'Parity bit is', 'an error-detecting code based on a summation operation performed on the bits to be checked.', 'a check bit appended to an array of binary digits to make the sum of all the binary digits.', 'a code in which each expression conforms to specific rules of construction, so that if certain errors occur in an expression, the resulting expression will not conform to the rules of construction and', 'the ratio of the number of data units in error to the total number of data units', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(227, 'Which of the following file retrieval methods use hypermedia?', 'HTTP', 'WAIS', 'Veronica', 'Archie', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(228, 'Which IP address class has few hosts per network?', 'D', 'C', 'B', 'A', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(229, 'Microprogramming is', 'assembly language programming', 'programming of minicomputers', 'control unit programming', 'macro programming of microcomputers', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(230, 'You are working with a network that has the network ID 192.168.10.0. What subnet should you use that supports up to 12 hosts and a maximum number of subnets?', '255.255.255.192', '255.255.255.224', '255.255.255. 240', '255.255.255.248', '255.255.255.252', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(231, 'Which of the following statements is incorrect?', 'Multiplexers are designed to accept data from several I/O devices and transmit a unified stream of data on one communication line.', 'HDLC is a standard synchronous communication protocol.', 'RTS/CTS is the way the DTE indicates that it is ready to transmit data and the way the DCE indicates that it is ready to accept data.', 'RTS/CTS is the way the terminal indicates ringing', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(232, 'If communication software can be called the \"traffic cop\" of a micro communication system, then what should the modem be called?', 'Park', 'Bridge', 'Interface', 'Link', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(233, 'Which of the following specifies the network address and host address of the computer?', 'The IP address', 'The TCP address', 'The subnet mask', 'The default gateway', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(234, 'For connecting modem, a computer must be equipped with a port that conforms to the RS-232 standard of the Electronic Industries Association of America. What do the letters \'RS\' stand for?', 'Recognised standard', 'Random sequence', 'Recommended standard', 'Registered source', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(235, 'A network that requires human intervention of route signals is called a', 'bus network', 'ring network', 'star network', 'T-switched network', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(236, 'What is the port number for POP3?', '110', '90', '80', '49', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(237, 'Which of the following provides a storage mechanism for incoming mail but does not allow a user to download messages selectively?', 'SMTP', 'DHCP', 'IMAP', 'POP3', '2', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(238, 'On a class C network with a subnet mask of 192, how many subnets are available?', '254', '62', '30', '14', '2', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(239, 'Ethernet and Token-Ring are the two most commonly used network architectures in the world. Jim has heard of the different topologies for networks and wants to choose the architecture that will provide him with the most options. Which of the following would that be? Choose the most correct answer.', 'Token-Ring because it currently can run at both 4Mbps and 16Mbps. This means that it can be used in any topology', 'Ethernet, because it is cabled using fiber-optic cable', 'Token-Ring, because it uses a MAU', 'Ethernet, because it can be set up with most topologies and can use multiple transfer speeds', 'Neither Token-Ring nor Ethernet is the proper choice. Only ARCnet can be used in all topologies', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(240, 'A 4 KHz noiseless channel with one sample every 125 per sec, is used to transmit digital signals. Find the bit rate (bits per second) that are sent, if CCITT 2.048 Mbps encoding is used.', '500 Kbps', '32 Kbps', '8 Kbps', '64 Kbps', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(241, 'How can you see the address of the DHCP server from which a client received its IP address?', 'By using Advanced Properties of TCP/IP', 'By using IPCONFIG/ALL', 'By using DHCPINFO', 'By pinging DHCP', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(242, 'In a synchronous modem, the receive equalizer is known as', 'adaptive equalizer', 'impairment equalizer', 'statistical equalizer', 'compromise equalizer', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(243, 'Alex is required to provide information on how many people are using the network at any one time. Which network will enable him to do so?', 'Server-based', 'Token-Ring', 'Ethernet', 'Star', 'Peer-to-peer', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(244, 'Now-a-days computers all over the world can talk to each other. Which is one of the special accessories essential for this purpose?', 'Keyboard', 'Modem', 'Scanner', 'Fax', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(245, 'To make possible the efficient on-line servicing of many teleprocessing system users on large computer systems, designers are developing', 'communication systems', 'multiprogramming systems', 'virtual storage systems', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(246, 'Which of the following best describes the scopes on each DHCP server, in the absence of configuration problems with DHCP addresses, if you use multiple DHCP servers in your environment?', 'Unique to that subnet only', 'For different subnets', 'For no more than two subnets', 'For no subnets', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(247, 'The main difference between TCP and UDP is', 'UDP is connection oriented where as TCP is datagram service', 'TCP is an Internet protocol where as UDP is an ATM protocol', 'UDP is a datagram where as TCP is a connection oriented service', 'All of the above', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(248, 'What operates in the Data Link and the Network layer?', 'NIC', 'Bridge', 'Brouter', 'Router', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(249, 'What is the name of the computer based EMMS that provides a common forum where users can check in at their convenience, post messages, actively exchange ideas and participate in ongoing discussions?', 'E-mail', 'Bulletin board system (BBS)', 'Teleconferencing', 'Videoconferencing', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(250, 'Which of the following statement is incorrect?', 'The CCITT Recommendation X.25 specifies three layers of communication: physical, link and network.', 'The second layer of communication is the data-link layer', 'Errors in the physical layer can be detected by the data link layer', 'The fourth layer, in reference to the OSI model, is the session layer', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(251, 'Devices on one network can communicate with devices on another network via a', 'file server', 'utility server', 'printer server', 'gateway', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(252, 'After coding a document into a digital signal, it can be sent by telephone, telex or satellite to the receiver where the signal is decoded and an exact copy of the original document is made. What is it called?', 'Telex', 'Word processor', 'Facsimile', 'Electronic mail', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(253, 'Which file transfer protocol uses UDP?', 'NFS', 'TELNET', 'TFTP', 'FTP', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(254, 'You are working with a class C network. You are required to configure it for five subnets, each of which will support 25 nodes. What subnet should you use?', '255.255.255.0', '255.255.255.224', '255.255.255.240', '255.255.255.248', '255.255.255.252', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(255, 'A network designer wants to connect 5 routers as point-to-point simplex line. Then the total number of lines required would be', '5', '10', '20', '32', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(256, 'Which of the following medium access control technique is used for bus/tree?', 'token ring', 'token bus', 'CSMA', 'MAC', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(257, 'A distributed data processing configuration in which all activities must pass through a centrally located computer is called a:', 'ring network', 'spider network', 'hierarchical network', 'data control network', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(258, 'The size or magnitude of a voltage or current waveform is', 'Amplitude', 'Aloha', 'Angle Modulation', 'Attenuation', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(259, 'Which of the following network access standard is used for connecting stations to a circuit-switched network?', 'X.3', 'X.21', 'X.25', 'X.75', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(260, 'Which of the following is not a transmission medium?', 'telephone lines', 'coaxial cable', 'modem', 'microwave systems', 'satellite systems', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(261, 'A batch processing terminal would not include a', 'CPU', 'card reader', 'card punch', 'line printer', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(262, 'Packet Switch Stream (PSS) was introduced in', 'the US in 1961 (&) the UK in 1981', 'the UK in 1980', 'the US in 1961', 'None of the above', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(263, 'The physical layer of a network', 'defines the electrical characteristics of signals passed between the computer and communication devices', 'controls error detection and correction', 'constructs packets of data and sends them across the network', 'All of the above', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(264, 'Which of the following allows devices on one network to communicate with devices on another network?', 'multiplexer', 'gateway', 't-switch', 'modern', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(265, 'An error detecting code is which code is the remainder resulting from dividing the bits to be checked by a predetermined binary number, is known as', 'Cyclic redundancy check', 'Checksum', 'Error detecting code', 'Error rate', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(266, 'Bulletin board system', 'is a public access message system', 'is a modem capable of accepting commands', 'converts analog signals to digital signals', 'converts digital signals to analog signals', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(267, 'In OSI model, which of the following layer provides error-free delivery of data?', 'Data link', 'Network', 'transport', 'Session', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(268, 'Error detection at the data link level is achieved by?', 'Bit stuffing', 'Hamming codes', 'Cyclic Redundancy codes', 'Equalization', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(269, 'The area of coverage of a satellite radio beam is known as', 'Footprint', 'Circular polarization', 'Beam width', 'Identity', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(270, 'Which of the following data transmission media has the largest terrestrial range without the use of repeaters or other devices?', 'Hardwiring', 'Microwave', 'Satellite', 'Laser', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(271, 'What is the minimum number of wires needed to send data over a serial communication link layer?', '1', '2', '4', '6', 'none of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(272, 'The _____ layer is the layer closest to the transmission medium.', 'transport', 'network', 'data link', 'physical', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(273, 'What is the name of the device that connects two computers by means of a telephone line?', 'Tape', 'modem', 'bus', 'cable', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(274, 'What is the main difference between DDCMP and SDLG?', 'DDCMP does not need special hardware to final the beginning of a message.', 'DDCMP has a message header', 'SDLC has a IP address', 'SDLC does not use CRC', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(275, 'On a class B network, how many subnets are available with a subnet mask of 248?', '2', '6', '30', '62', '126', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0');
INSERT INTO `questions` (`question_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `answer`, `explanation`, `subject`, `topic_name`, `question_hindi`, `option_a_hindi`, `option_b_hindi`, `option_c_hindi`, `option_d_hindi`, `option_e_hindi`) VALUES
(276, 'Ethernet networks can be cabled in a number of topologies, depending on what works best in each environment. As more nodes are added, the efficiency of Ethernet decreases. Select the best answer as to why Ethernet becomes less efficient as size increases.', 'Network collisions occur', 'Repeaters cannot increase the signal strength sufficiently', 'Cable terminators do not reflect the signal properly', 'Cable terminators do not absorb the signal properly', '\"Line echo\" occurs due to the impedance of the cable', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(277, 'In a _____ topology, if there are n devices in a network, each device has n - 1 ports for cables.', 'ring', 'bus', 'star', 'mesh', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(278, 'Typewriter terminals can print computer-generated data at a rate of', '10 characters per second', '120 characters per second', '120 characters per minute', '1200 characters per minute', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(279, 'To avoid transmission errors, a check figure is calculated by the', 'transmitting computer', 'receiving computer', 'both A and B', 'Start and stop bit', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(280, 'What is the first octet range for a class A IP address?', '1 - 126', '192 - 255', '192 - 223', '1 - 127', '128 - 191', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(281, 'Which of the following is not a standard synchronous communication protocol?', 'SDLC', 'SMTP', 'SLIP', 'PAS', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(282, 'The network layer, in reference to the OSI model, provide', 'data link procedures that provide for the exchange of data via frames that can be sent and received', 'the interface between the X.25 network and packet mode device', 'the virtual circuit interface to packet-switched service', 'All of the above', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(283, 'In OSI network architecture, the routing is performed by', 'network layer', 'data link layer', 'transport layer', 'session layer', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(284, 'Which of the following communications lines is best suited to interactive processing applications?', 'narrowband channels', 'simplex lines', 'full-duplex lines', 'mixed band channels', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(285, 'What is the first octet range for a class B IP address?', '128 - 255', '1 - 127', '192 - 223', '128 - 191', '127 - 191', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(286, 'The 32-bit internet address 10000000 00001010 00000010 00011110 will be written in dotted decimal notation as', '148.20.2.30', '164.100.9.61', '210.20.2.64', '128.10.2.30', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(287, 'Which of the following items is not used in Local Area Networks (LANs)?', 'Computer', 'Modem', 'Printer', 'Cable', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(288, 'Error detection at a data link level is achieved by', 'bit stuffing', 'cyclic redundancy codes', 'Hamming codes', 'equalization', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(289, 'RS-232-G', 'is an interface between two data circuit terminating equipment as examplified by a local and remote modem', 'is an interface standard between Data terminal Equipment and Data Circuit Terminating Equipment', 'specifies only the mechanical characteristics of an interface by providing a 25-pin connector', 'requires only 7 pin out of 25 in order to transmit digital data over public telephone lines', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(290, 'A subdivision of main storage created by operational software is referred to as a:', 'compartment', 'time-shared program', 'divided core', 'partition', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(291, 'RS-449/442-A/423-A is', 'a set of physical layer standards developed by EIA and intended to replace RS-232-C.', 'a check bit appended to an array of binary digits to make the sum of the all the binary digits', 'a code in which each expression conforms to specific rules of construction, so that if certain errors occur in an expression the resulting expression will not conform to the rules of construction and', 'the ratio of the number of data units in error to the total number of data units', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(292, 'Which of the following digits are known as the area code of the Network User Address (NUA)?', '05-Jul', '01-Apr', '08-Dec', '13-14', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(293, 'End-to-end connectivity is provided from host-to-host in:', 'Network layer', 'Session layer', 'Data link layer', 'Transport layer', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(294, 'A form of modulation In which the amplitude of a carrier wave is varied in accordance with some characteristic of the modulating signal, is known as', 'Aloha', 'Angle modulation', 'Amplitude modulation', 'modem', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(295, 'CSMA   (Carrier  Sense   Multiple Access) is', 'a method of determining which device has access to the transmission medium at any time', 'a method access control technique for multiple-access transmission media.', 'a very common bit-oriented data link protocol issued by ISO.', 'network access standard for connecting stations to a circuit-switched network', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(296, 'Which of the following summation operation is performed on the bits to check an error-detecting code?', 'Codec', 'Coder-decoder', 'Checksum', 'Attenuation', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(297, 'The standard suit of protocols used by the Internet, intranets, extranets, and some other networks.', 'TCP/IP', 'Protocol', 'Open Systems', 'Internetwork processor', 'Hybrid hub', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(298, 'Networks that follow the 802.5 standard appear to be in a star topology but are actually operating in what type of topology?', 'Linear bus', 'Modified star', 'Modified ring', 'Ring', 'Hybrid hub', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(299, 'A communications device that combines transmissions from several I/O devices into one line is a:', 'concentrator', 'modifier', 'multiplexer', 'full-duplex line', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(300, 'The main difference between synchronous and asynchronous transmission is', 'the clocking is derived from the data in synchronous transmission', 'the clocking is mixed with the data in asynchronous transmission', 'the pulse height is different.', 'the     bandwidth     required     is different', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(301, 'ARP (Address Resolution Protocol) is', 'a TCP/IP protocol used to dynamically bind a high level IP Address to a low-level physical hardware address', 'a TCP/IP high level protocol for transferring files from one machine to another', 'a protocol used to monitor computers', 'a protocol that handles error and control messages', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(302, 'Which of the following uses network address translation?', 'Routers', 'Network adapter drivers', 'Hubs', 'Windows 95', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(303, 'The X.25 standard specifies a', 'technique for start-stop data', 'technique for dial access', 'DTE/DCE interface', 'data bit rate', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(304, 'The most important part of a multiple DHCP configurations is to make sure you don\'t have which of the following in the different scopes? Select the best answer.', 'Duplicate addresses', 'Duplicate pools', 'Duplicate subnets', 'Duplicate default gateways', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(305, 'When a group of computers is connected together in a small area without the help of telephone lines, it is called', 'Remote communication network (RCN)', 'Local area network(LAN)', 'Wide area network (WAN)', 'Value added network (VAN)', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(306, 'The 802.5 standard implements a way for preventing collisions on the network. How are collisions prevented when using this standard?', 'CSMA/CD', 'Token passing', 'Collision detection', 'Time sharing', 'Switched repeaters', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(307, 'A communication network which is used by large organizations over regional, national or global area is called', 'LAN', 'WAN', 'MAN', 'Intranet', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(308, 'Information systems with common hardware, software, and network standards that provide easy access for end users and their networked computer systems. Select the best fit for answer:', 'TCP/IP', 'Protocol', 'Open Systems', 'Internetwork processor', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(309, 'Which of the following TCP/IP protocol is used for file transfer with minimal capability and minimal overhead?', 'RARP', 'FTP', 'TFTP', 'TELNET', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(310, 'Terminals are required for', 'realtime, batch processing, and timesharing', 'realtime, timesharing, and distributed processing', 'realtime, distributed processing, and manager inquiry', 'realtime, timesharing, and message switching', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(311, 'Sending a file from your personal computer\'s primary memory or disk to another computer is called', 'uploading', 'downloading', 'logging on', 'hang on', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(312, 'Business meeting and conferences can be held by linking distantly located people through a computer network. Not only the participants exchange information but are able to see each other. What is it called?', 'Telemeeting', 'Telemailing', 'Teleconferencing', 'Teletalking', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(313, 'What frequency range is used for microwave communications, satellite and radar?', 'Low Frequency : 30 kHz to 300 kHz', 'Medium Frequency : 300 kHz to 3 MHz', 'Super High Frequency : 3000 MHz to 30000 MHz', 'Extremely High Frequency :30,000 MHz', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(314, 'Which of the following statements is incorrect?', 'The difference between synchronous and asynchronous transmission is the clocking derived from the data in synchronous transmission', 'Half-duplex line is a communication line in which data can move in two directions, but not at the same time.', 'Teleprocessing combines telecommunications and DP techniques in online activities.', 'Batch processing is the preferred processing mode for telecommunication operations', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(315, 'If the ASCII character H is sent and the character I is received, what type of error is this?', 'single-bit', 'multiple-bit', 'burst', 'recoverable', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(316, 'A 4 KHz noise less channel with one sample ever 125 per sec is used to transmit digital signals. If Delta modulation is selected, then how many bits per second are actually sent?', '32 kbps', '8 kbps', '128 kbps', '64 kbps.', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(317, 'UDP is:', 'Not a part of the TCP/IP suite', 'Connection oriented and unreliable', 'Connection orientated and reliable', 'Connectionless and unreliable', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(318, 'The interactive transmission of data within a time sharing system may be best suited to', 'simplex lines', 'half-duplex lines', 'full-duplex lines', 'biflex-line', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(319, 'What OSI layer handles logical address to logical name resolution?', 'Transport', 'Physical', 'Presentation', 'Data Link', 'An alias for the computer name', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(320, 'The MAC (Media Access Control) address of the network card is used in both Ethernet and Token-Ring networks and is essential for communication. What does MAC provide?', 'A logical address that identifies the workstation', 'A physical address that is randomly assigned each time the computer is started', 'A physical address that is assigned by the manufacturer', 'The logical domain address for the workstation', 'An alias for the computer name', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(321, 'Which of the following is an example of a client-server model?', 'TELNET', 'FTP', 'DNS', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(322, 'In CRC there is no error if the remainder at the receiver is _____.', 'the quotient at the sender', 'nonzero', 'zero', 'equal  to the remainder at the sender', 'None of the above.', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(323, 'A WATS arrangement', 'is always less expensive than flat-rate service', 'is less expensive than flat-rate service only when the number of calls is large and the duration of each is short', 'is less expensive than flat-rate service only when the number of calls is small and the duration of each is long', 'is never less expensive than flat-rate service', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(324, 'A T-switch is used to', 'control how messages are passed between computers', 'echo every character that is received', 'transmit characters one at a time', 'rearrange the connections between computing equipment', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(325, 'A global network of millions of business, government, educational, and research networks; computer systems; database; and end users. Select the best fit for answer:', 'Internet works', 'The Internet', 'Internet revolution', 'Internet technologies', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(326, 'Alice is setting up a small network in her home so that she can study for her MCSE exams. She doesn\'t have a lot of money to spend on hardware, so she wants to use a network topology that requires the least amount of hardware possible. Which topology should she select?', 'Star', 'Right', 'Token-Ring', 'Ethernet', 'Bus', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(327, 'The CCITT Recommendation X.25 specifies three layers of communications:', 'application, presentation and session', 'Session, transport and network', 'physical datalink and network', 'datalink, network and transport', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(328, 'Which of the following technique is used for allocating capacity on a satellite channel using fixed-assignment FDM?', 'Amplitude modulation', 'Frequency-division multiple access', 'Frequency modulation', 'Frequency-shift keying', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(329, 'The amount of uncertainty in a system of symbol is called', 'Bandwidth', 'Entropy', 'loss', 'Quantum', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(330, 'Which of the following allows a simple email service and is responsible for moving messages from one mail server to another?', 'IMAP', 'DHCP', 'SMTP', 'FTP', 'POP3', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(331, 'What does 192 translate to in binary?', '11000000', '111110', '1111', '11', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(332, 'An information utility can offer a user', 'instant bonds and stock quotations', 'news stories from wire services', 'complete airline schedules for all domestic flights', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(333, 'An international standard, multilevel set of protocols to promote compatibility among telecommunications networks. Select the best fit for answer:', 'Network Server', 'Virtual Private Network', 'Network operating system', 'OSI', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(334, 'Many large organizations with their offices in different countries of the world connect their computers through telecommunication satellites and telephone lines. Such a communication network is called', 'LAN', 'WAN', 'ECONET', 'EITHERNET', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(335, 'A network which is used for sharing data, software and hardware among several users owning microcomputers is called', 'WAN', 'MAN', 'LAN', 'VAN', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(336, 'In geosynchronous orbit, satellite', 'remains in a fixed position so that as earth rotates, it can fully cover the earth', 'remains in a fixed position related to points on earth', 'moves faster than the earth\'s rotation so that it can cover larger portion of earth.', 'moves simultaneously', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(337, 'A proposed network infrastructure of interconnected local, regional, and global networks that would support universal interactive multimedia communications. Select the best fit for answer:', 'Internetworked enterprise', 'Information super highway', 'Business applications of telecommunications', 'Client/Server networks', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(338, 'What does 240 translate to in binary?', '11110000', '11110', '1111', '11100000', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(339, 'You are working with a network that has the network ID 10.9.0.0 and contains 73 networks. In the next year, you will be adding an additional 27 branch offices to your company. For simplified management, you want to keep the most possible hosts per subnet. Which subnet mask should you management, you want to keep the most possible hosts per subnet. Which subnet mask should you use?', '255.224.0.0', '255.240.0.0', '255.248.0.0', '255.252.0.0', '255.254.0.0', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(340, 'A group of 2m - 1 routers are interconnected in a centralized binary tree, with router at each tree node. Router I communicate with router J by sending a message to the root of the tree. The root then sends the message back down to J. Then find the mean router-router path length.', '2 (m - 2)', '2 (2m - 1)', 'm - 1', '(2m - l)/mJ', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(341, 'Most networks are connected to other local area or wide area networks. Select the best fit for answer:', 'Internet works', 'The Internet', 'Internet revolution', 'Internet technologies', '255.255.252.0', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(342, 'You are working with a network that is 172.16.0.0 and would like to support 600 hosts per subnet. What subnet mask should you use?', '255.255.192.0', '255.255.224.0', '255.255.240.0', '255.255.248.0', '255.255.252.0', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(343, 'A 6-MHz channel is used by a digital signaling system utilizing 4-level signals. What is the maximum possible transmission rate?', '1.5 Mbaud/sec', '6 Mband/sec', '12 Mbaud/sec', '24 Mbaud/sec', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(344, 'Which of the following digits are known as the sub-address digits (for use by the user) of the Network User Address (NUA)?', '05-Jul', '01-Apr', '08-Dec', '13-14', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(345, 'Error detecting code is', 'an error-detecting code based on a summation operation performed on the bits to be checked', 'a check bit appended to an array of binary digits to make the sum of all the binary digits.', 'a code in which each expression conforms to specify rules of construction, so that if certain errors occur in an expression, the resulting expression will not conform to the rules of construction and', 'the ratio of the data units in error to the total number of data units', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(346, 'The birthplace of the World Wide Web is considered to be', 'the Department of Defense', 'CERN', 'ARPA', 'Netscape', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(347, 'You have purchased a MAU (Multistation Access Unit) from your computer supplier and now must decide what type of network card you should install in the workstations. Which of the following would be the most appropriate?', 'Fast SCSI Wide', 'Token-Ring', 'ArcServe', 'Ethernet', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(348, 'What is the loopback address?', '127.0.0.1', '255.0.0.0', '255.255.0.0', '255.255.255.255.0', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(349, 'An ROP would be attached to a', 'simplex channel', 'duplex channel', 'half duplex channel', 'full duplex channel', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(350, 'Who originally designed TCP/IP?', 'The Department of Defense', 'Novell', 'IBM', 'Xerox', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(351, 'The systematic access of small computers in a distributed data processing system is referred to as:', 'dialed service', 'multiplexing', 'polling', 'conversational mode', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(352, 'The process of converting analog signals into digital signals so they can be processed by a receiving computer is referred to as:', 'modulation', 'demodulation', 'synchronizing', 'synchronizing', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(353, 'An example of digital, rather than analog, communication is', 'DDD', 'DDS', 'WATS', 'DDT', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(354, 'How many OSI layers are covered in the X.25 standard?', 'two', 'three', 'seven', 'six', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(355, 'A band is always equivalent to', 'a byte', 'a bit', '100 bits', '16 bits', 'None of the above', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(356, 'What is the port number for HTTP?', '99', '86', '80', '23', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(357, 'The most flexibility in how devices are wired together is provided by', 'bus networks', 'ring networks', 'star networks', 'T-switched networks', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(358, 'Which of the following statement is incorrect?', 'The transport layer provides for any format, translationer code conversion necessary to put the data into an intelligible format.', 'The presentation layer transforms information from machine format to the understandable format.', 'The data link layer handles the transfer of data between the ends of a physical link.', 'All of the above', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(359, 'When you connect to an online information service, you are asked to provide some kind of identification such as your name, an account number and a password. What is the name given to this brief dialogue between you and the information system?', 'Security procedure', 'Safeguard procedure', 'Identification procedure', 'Log-on procedure', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(360, 'Bus is', 'one or more conductors that some as a common connection for a related group of devices', 'a continuous frequency capable of being modulated or impressed with a second signal', 'the condition when two or more stations attempt to use the same channel at the same time', 'a collection of interconnected functional units that provides a data communications service among stations attached to the network', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(361, 'Which of the following medium is used for broadband local networks?', 'Coaxial cable', 'optic fiber', 'CATV', 'UTP', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(362, 'In cyclic redundancy checking what is the CRC?', 'the divisor', 'the quotient', 'the dividend', 'the remainder', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(363, 'What is the maximum number of entries in the HOSTS file?', '8', '255', '500', 'Unlimited', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(364, 'The communication mode that supports data in both directions at the same time is', 'simplex', 'half-duplex', 'full-duplex', 'multiplex', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(365, 'Which of the following program is used to copy files to or from another UNIX timesharing system over a single link?', 'VMTP', 'TFTP', 'UUCP', 'UART', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(366, 'One important characteristic of the hub architecture of ARC-net is', 'directionalized transmission', 'access control and addressing', 'multiple virtual networks', 'alternative routing', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(367, 'The basic Ethernet design does not provide', 'access control', 'addressing', 'automatic retransmission of a message', 'multiple virtual networks', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(368, 'Phase shift keying (psk) method is used to modulate digital signals at 9600 bps using 16 levels. Find the line signaling speed (i.e., modulation rate)', '2400 bands', '1200 bands', '4800 bands', '9600 bands', 'DHCP Management Console', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(369, 'You are in the process of analyzing a problem that requires you to collect and store TCP/IP Packets. Which of the following utilities is best suited for this purpose?', 'NBTSTAT', 'Performance Monitor', 'NETSTAT', 'Network Monitor', 'DHCP Management Console', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(370, 'A software that allows a personal computer to pretend it as a terminal is', 'auto-dialing', 'bulletin board', 'modem', 'terminal emulation', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(371, 'What is the name of the network topology in which there are bi-directional links between each possible node?', 'Ring', 'Star', 'Tree', 'Mesh', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(372, 'What is the main purpose of a data link content monitor?', 'to detect problems in protocols', 'to    determine    the    type    of transmission used in a data link', 'to     determine    the    type    of switching used in a data link.', 'to determine the flow of data', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(373, 'Synchronous protocols', 'transmit characters one at a time', 'allow faster transmission than asynchronous protocols do', 'are generally used by personal computers', 'are more reliable', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(374, 'To set up a bulletin board system you need', 'a smart modem with auto-answer capabilities', 'a telephone line', 'a personal computer', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(375, 'Videotex is a combination of', 'television', 'communication', 'computer technology', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(376, 'Which of the following frequency ranges is used for AM radio transmission?', 'Very Low Frequency : 3 kHz to 30 kHz', 'Medium Frequency : 300 kHz to 3 MHz', 'High Frequency : 3 MHz to 30 MHz', 'Very High Frequency : 30 MHz to 300 MHz', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(377, 'Baseband is', 'transmission of signals without modulation', 'a signal all of whose energy is contained within a finite frequency range', 'the simultaneous transmission of data to a number of stations', 'All of the above', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(378, 'A 4 KHz noise less channel with one sample ever 125 per sec is used to transmit digital signals. Differential PCM with 4 bit relative signal value is used. Then how many bits per second are actually sent?', '32 Kbps', '64 Kbps', '8 Kbps', '128 Kbps.', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(379, 'X.21 is', 'a method of determining which device has access to the transmission medium at any time', 'a method access control technique for multiple-access transmission media', 'a very common bit-oriented data link protocol issued by ISO', 'network access standard for connecting stations to a circuit-switched network', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(380, 'What is the minimum number of wires required for sending data over a serial communications links?', '2', '1', '4', '3', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(381, 'In cyclic redundancy checking, the divisor is _____ the CRC.', 'the same size as', 'one bit less than', 'one bit more than', 'two bits more', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(382, 'Which command-line tool is included with every Microsoft TCP/IP client?', 'DHCP', 'WINS', 'PING', 'WINIPCFG', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(383, 'If odd parity is used for ASCII error detection, the number of 0s per eight-bit symbol is _____.', 'even', 'odd', 'indeterminate', '42', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(384, 'An error-detecting code inserted as a field in a block of data to be transmitted is known as', 'Frame check sequence', 'Error detecting code', 'Checksum', 'flow control', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(385, 'Number of bits per symbol used in Baudot code is', '1', '5', '8', '9', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(386, 'Working of the WAN generally involves', 'telephone lines', 'microwaves', 'satellites', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(387, 'What does the acronym ISDN stand for?', 'Indian Standard Digital Network', 'Integrated Services Digital Network', 'Intelligent Services Digital Network', 'Integrated Services Data Network', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(388, 'Which of the following services dynamically resolves NetBIOS-to-IP resolution?', 'DNS', 'DHCP', 'WINS', 'LMHOSTS', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(389, 'An example of a medium-speed, switched communications service is', 'Series 1000', 'Dataphone 50', 'DDD', 'All of the above', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(390, 'A devices that links two homogeneous packet-broadcast local networks, is', 'gateway', 'repeater', 'bridge', 'hub', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(391, 'A computer that handles resource sharing and network management in a local area network. Select the best fit for answer:', 'Network Server', 'Virtual Private Network', 'Network operating system', 'OSI', 'Three', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(392, 'Repeaters are often used on an 802.3 network to help strengthen the signals being transmitted. As with the length of segments and the number of segments, a limit exists as to how many repeaters can be used between any two nodes. What is the maximum number of repeaters that can be used?', 'Five', 'Two', 'Four', 'Six', 'Three', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(393, 'How much power (roughly) a light-emitting diode can couple into an optical fiber?', '100 microwatts', '440 microwatts', '100 picowatts', '10 milliwatts', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(394, 'A modem that is attached to the telephone system by jamming the phone\'s handset into two flexible receptacles in the coupler?', 'gateway', 'bridge', 'acoustic coupler', 'time-division multiplexer', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(395, 'With  telecommunications  and  a personal computer you can', '\"download\" free public domain programs', 'send letters to be printed and delivered by the post office', 'order goods at a substantial discount', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(396, 'Which of the following statement is correct?', 'Teleprinters are used for printing at remote locations, not for input.', 'Teleprinters are same as teletypes', 'Teleprinters are same as x400', 'Teleprinters have a printer for output and keyboard for input', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(397, 'What does 224 translate to in binary?', '11110000', '11110', '1111', '11100000', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(398, 'What can cause a problem with communication with a client by name but not by IP address?', 'The IP address', 'Static files such as an LMHOSTS file or a DNS database', 'Subnet mask', 'The default gateway', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(399, 'Layer one of the OSI model is', 'physical layer', 'link layer', 'transport layer', 'network layer', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(400, 'What is the term used to describe addresses available on a DHCP server?', 'Pools', 'Scopes', 'Ranges', 'Notes', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(401, 'Which of the following signals is not standard RS - 232-C signal?', 'VDR', 'RTS', 'CTS', 'DSR', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(402, 'What is the default subnet mask for a class B network?', '127.0.01', '255.0.0.0', '255.255.0.0', '255.255.255.0', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(403, 'Which of the following files is used for NetBIOS name resolution?', 'HOSTS', 'LMHOSTS', 'ARP', 'FQDN', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(404, 'In CRC the quotient at the sender', 'becomes the dividend at  the receiver', 'becomes the divisor at the receiver', 'is discarded', 'is the remainder', '', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(405, 'How many pairs of stations can simultaneously communicate on Ethernet LAN?', '1', '2', '3', 'multiple', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(406, 'The OCR reading unit attached to a POS terminal is called a', 'light pen', 'wand', 'cursor', 'All of the above', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(407, 'A protocol is a set of rules governing a time sequence of events that must take place', 'between peers', 'between modems', 'between an interface', 'across an interface', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(408, 'The coming together of three technologies i.e. microelectronics, computing and communications has ushered in', 'information explosion', 'information technology', 'business revolution', 'educational upgradation', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(409, 'Terminals are used to', 'collect data from the physical system', 'provide information for the manager', 'communicate management decisions to the physical system', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(410, 'Sales persons and other employees of the company who spend much of their time away from their offices but keep in touch with their company\'s microcomputers or main frame computers over telephone lines are called', 'field workers', 'telecommuters', 'teleprocessors', 'company directors', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(411, 'What is the standard protocol for network management features?', 'SNA', 'FTP', 'SNMP', 'SMS', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(412, 'The application layer of a network', 'establishes, maintains, and terminates virtual circuits', 'defines the user\'s port into the network', 'consists of software being run on the computer connected to the network', 'All of the above', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(413, 'Brad is in charge of a small network and wants to make it simple but secure. The users want to have full control over their data and still be able to share data with the rest of the office. The networking knowledge of the office staff is excellent. Which network(s) would be the best to set up?', 'Peer-to-peer', 'Master domain', 'Server-based', 'Ethernet', 'Share-level', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(414, 'The simultaneous transmission of data to a number of stations is known as', 'broadcast', 'Band width', 'Aloha', 'Analog transmission', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(415, 'Most data communications involving telegraph lines use:', 'simplex lines', 'wideband channels', 'narrowband channels', 'dialed service', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(416, 'You have a network ID of 134.57.0.0 with 8 subnets. You need to allow the largest possible number of host IDs per subnet. Which subnet mask should you assign?', '255.255.224.0', '255.255.240.0', '255.255.248.0', '255.255.252.0', '255.255.255.255', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(417, 'Modulation is the process of', 'sending a file from one computer to another computer', 'converting digital signals to analog signals', 'converting analog signals to digital signals', 'echoing every character that is received', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(418, 'Which multiplexing technique shifts each signal to a different carrier frequency?', 'FDM', 'synchronous TDM', 'asynchronous TDM', 'All of the above', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(419, 'Which of the following protocol is connection-oriented?', 'IPX', 'UDP', 'NetBEUI', 'TCP', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0');
INSERT INTO `questions` (`question_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `answer`, `explanation`, `subject`, `topic_name`, `question_hindi`, `option_a_hindi`, `option_b_hindi`, `option_c_hindi`, `option_d_hindi`, `option_e_hindi`) VALUES
(420, 'The loss in signal power as light travels down the fiber is called', 'attenuation', 'propagation', 'scattering', 'interruption', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(421, 'Operating system functions may include', 'input/output control', 'virtual storage', 'multiprogramming', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(422, 'Which layer of international standard organization\'s OSI model is responsible for creating and recognizing frame boundaries?', 'physical layer', 'data link layer', 'transport layer', 'network layer', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(423, 'Which of the following might be used by a company to satisfy its growing communications needs?', 'front-end processor', 'multiplexer', 'controller', 'concentrator', 'All of the above', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(424, 'Different computers are connected to a LAN by a cable and a/an', 'modem', 'interface card', 'special wires', 'telephone lines', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(425, 'The Token-Ring architecture was developed for a more efficient way to determine who should be transmitting at any one time. With Ethernet, collisions may take place, causing the transmitting computers to have to retransmit their data. The use of token guarantees that only one computer can transmit at a time. What happens as the network increases in size? Choose the best answer', 'An additional token is added for every 1,000 nodes', 'The speed of the Token-Ring network must be 16Mbps if the number of nodes is greater then 500', 'The network becomes less efficient', 'After the number of nodes exceeds 550, the Multistation Access Unit must be replaced by the more powerful Hyperstation Unified Bandwidth device', 'The network becomes more efficient', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(426, 'A characteristic of a multiprogramming system is:', 'simultaneous execution of program instructions from two applications', 'concurrent processing of two or more programs', 'multiple CPUs', 'All the above', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(427, 'When a host knows its physical address but not its IP address, it can use _____.', 'RARP', 'ARP', 'IGMP', 'ICMP', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(428, 'What is the name given to the exchange of control signals which is necessary for establishing a connection between a modem and a computer at one end of a line and another modem and computer at the other end?', 'Handshaking', 'Modem options', 'Protocol', 'Duplexing', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(429, 'A communications medium that uses pulses of laser light in glass fibers. Select the best fit for answer:', 'Fiber optic cables', 'Cellular phone systems', 'Telecommunications processors', 'Telecommunications software', '', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(430, 'After you have verified that TCP/IP is installed correctly, what is the next step in verifying the TCP/IP configuration?', 'Ping the broadcast address', 'Ping the Microsoft Web site', 'Ping a distant router.', 'Ping the address of the local host', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(431, 'Which utility is useful for troubleshooting NetBIOS name resolution problems?', 'NBTSTAT', 'Netstat', 'PING', 'Hostname', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(432, 'The EIA-232 interface has _____ pins.', '20', '24', '25', '30', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(433, 'In OSI model, which of the following layer transforms information from machine format into that understandable by user', 'application', 'presentation', 'session', 'physical', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(434, 'The channel in the data communication model can be', 'postal mail service', 'telephone lines', 'radio signals', 'All of the above', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(435, 'Which of the following is an important characteristic of LAN?', 'application independent interfaces', 'unlimited expansion', 'low cost access for low bandwidth channels', 'parallel transmission', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(436, 'Which of the following is a wrong example of network layer:', 'Internet      Protocol      (IP) ARPANET', 'X. 25 Packet Level Protocol (PLP) - ISO', 'Source routing and Domain naming - Usenet', 'X.25 level 2 - ISO', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(437, 'A 2000-character text file has to be transmitted by using a 1,200 baud modem. Can you tell how long will it take?', '2 seconds', '20 seconds', '120 seconds', '12 seconds', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(438, 'Telecommunications networks come in a wide range of speed and capacity capabilities. Select the best fit for answer:', 'Bandwidth alternatives', 'Switching alternating', 'Inter organizational networks', 'Extranets', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(439, 'Which of the following statements is correct?', 'characteristic of the hub architecture of ARC-net is alternative routing.', 'characteristic of LAN is unlimited expansion', 'characteristic of LAN is low cost access for low bandwidth channels', 'characteristic of the hub architecture of ARC-net is directionalized transmission', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(440, 'A modem is connected in between a telephone line and a', 'network', 'computer', 'communication adapter', 'serial port', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(441, 'What frequency range is used for TV transmission and low power microwave applications?', 'Very Low Frequency : 3 kHz to 30 kHz', 'Medium Frequency : 300 kHz to 3 MHz', 'Ultra High Frequency : 300 MHz to 3000 MHz', 'Super High Frequency : 3000 MHz to 30000 MHz', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(442, 'Which of the following statement is correct?', 'Satellite transponders use a higher frequency for reception of radiation from earth stations and lower frequency for transmission to earth stations.', 'Satellite transponders contain a device that echos the radiation without change from one point on earth to another', 'Satellite transponder contain devices that transform the message sent from one location on earth to a different code for transmission to another location', 'satellite transponders us lower frequency reception of radiation from earth stations and higher frequency for transmission to earth stations', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(443, 'We can receive data either through our television aerial or down our telephone lines and display this data on our television screen. What is the general name given to this process?', 'Viewdata', 'Teletext', 'Telesoftware', 'Videotex', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(444, 'ASK, PSK, FSK, and QAM are examples of _____ encoding.', 'digital-to-digital', 'digital-to-analog', 'analog-to-analog', 'analog-to-digital', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(445, 'The data-link layer, in reference to the OSI model, specifies', 'data link procedures that provide for the exchange of data via frames that can be sent and received', 'the interface between the X.25 network and packet mode device', 'the virtual circuit interface to packet-switched service', 'All of the above', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(446, 'What function does a serial interface perform in data communication?', 'Converts serial data into audio signals', 'Converts   analog   signals   into digital signals', 'Converts  parallel  data   into   a stream of bits', 'Decodes incoming signals into computer data', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(447, 'You need to determine whether IP information has been assigned to your Windows NT. Which utility should you use?', 'NBTSTAT', 'NETSTAT', 'IPCONFIG', 'WINIPCFG', 'PING', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(448, 'Eight stations are competing for the use of the shared channel using the modified Adaptive free walk protocol by Gallager. If the stations 7 and 8 are suddenly become ready at once, how many bit slots are needed to resolve the contention?', '1 slots', '5 slots', '10 slots', '14 slots', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(449, 'When two computers communicate with each other, they send information back and forth. If they are separated by a reasonable distance, they can send and receive the information through a direct cable connection which is called a null-modem connection. Presently what is the maximum distance in metres permitted in this null-modem connection?', '80', '100', '30', '150', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(450, 'Modulation in which the two binary values are represented by two different amplitudes of the carrier frequency is known as', 'Amplitude-shift keying', 'Amplitude', 'Amplitude modulation', 'Aloha', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(451, 'You have been contracted to install a windows NT network in an office that is located in a strip mall. The office is located next to the power plant of the building, so a UPS (uninterruptible power supply) has already been installed. What type of cable should you use for the network cabling? Choose the best answer.', 'TI', 'UTP', 'Fiber-optic', 'PSTN', 'STP', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(452, 'Communication circuits that transmit data in both directions but not at the same time are operating in', 'a simplex mode', 'a half-duplex mode', 'a full-duplex mode', 'an asynchronous mode', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(453, 'In a synchronous modem, the digital-to-analog converter transmits signal to the', 'equalizer', 'modulator', 'demodulator', 'terminal', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(454, 'If the client receives an address from a DHCP server, what is the only information available in the Network Properties dialog box?', 'The IP address', 'The subnet address', 'That the client is receiving its address from DHCP', 'The default gateway', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(455, 'An internetworking protocol that provides virtual circuit service across multiple X.25 protocol, is', 'X.75', 'X.25', 'X.400', 'X.21', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(456, 'Which of the following TCP/IP protocol is used for transferring files from one machine to another?', 'RARP', 'ARP', 'TCP', 'FTP', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(457, 'Which of the following is an example of bounded medium?', 'Coaxial cable', 'Wave guide', 'Fiber optic cable (d) All of the above', 'None of the above', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(458, 'Which transmission mode is used for data communication along telephone lines?', 'Parallel', 'Serial', 'Synchronous', 'Asynchronous', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(459, 'Who invented the modem?', 'Wang Laboratories Ltd.', 'AT & T Information Systems, USA', 'Apple Computers Inc.', 'Digital Equipment Corpn.', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(460, 'With an IP address starting at 200, you currently have 10 subnets. What subnet mask should you use to maximize the number of available hosts?', '192', '224', '240', '248', '252', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(461, 'Which of the following communications modes support two-way traffic but in only one direction of a time?', 'simplex', 'half-duplex', 'three-quarters duplex', 'full-of the above', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(462, 'Which of the following TCP/IP internet protocol a diskless machine uses to obtain its IP address from a server?', 'RDP', 'RARP', 'RIP', 'X.25', 'None of the above', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(463, 'In OSI network architecture, the dialogue control and token management are responsibilities of', 'session layer', 'network layer', 'transport layer', 'data link layer', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(464, 'Which of the following transmission systems provides the highest data rate to an individual device', 'Computer bus', 'Telephone lines', 'Voice band modem', 'leased lines', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(465, 'Which of the following connectivity devices is used to extend a network on a purely mechanical basis?', 'Gateway', 'Switch', 'Router', 'Active hub', '802.6', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(466, 'The IEEE 802 project of the 1980s involved further defining the lower two layers of the OSI model. A number of standards were agreed upon during that time. Which of the following is the standard for Ethernet?', '802.2', '802.3', '802.4', '802.5', '802.6', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(467, 'Which of the following digits are known as the terminal number of the Network User Address (NUA)?', '05-Jul', '01-Apr', '08-Dec', '13-14', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(468, 'Which of the following device is used with an X.25 network to provide service to asynchronous terminals', 'repeater', 'bridges', 'gateway', 'Packet assembler/disassemble', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(469, 'A medium access control technique for multiple access transmission media is', 'Aloha', 'Amplitude', 'Angle modulation', 'Attenuation', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(470, 'The core diameter of a single-mode fibers is about', '10 times the wavelength of the light carried in the fiber', '10 times the fiber radius', '7 times the light carried in the fiber', '3 times the wavelength of the light carried in the fiber', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(471, 'Which of the following TCP/IP protocol is used for remote terminal connection service?', 'TELNET', 'FTP', 'RARP', 'UDP', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(472, 'Networks where end user workstations are tied to LAN servers to share resources and application processing.', 'Internetworked enterprise', 'Information super highway', 'Business applications of telecommunications', 'Client/Server networks', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(473, 'The frequency range : 300 kHz to 3 MHz is used for', 'AM radio transmission', 'FM radio transmission', 'TV transmission', 'microwave communications, satellite and radar', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(474, 'With an IP address of 201.142.23.12, what is your default subnet mask?', '0.0.0.0', '255.0.0.0', '255.255.0.0', '255.255.255.0', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(475, 'A smart modem can dial, hang up and answer incoming calls automatically. Can you tell who provides the appropriate instruction to the modem for this purpose?', 'Communications software', 'Error detecting protocols', 'Link access procedure (LAP)', 'Telecommunications', 'None of the above', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(476, 'IEEE project 802 divides the data link layer into an upper _____ sublayer and a lower _____ sublayer.', 'HDLC, PDU', 'PDU, HDLC', 'MAC, LLC', 'LLC, MAC', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(477, 'Two computers that communicate with each other use a simple parity check to detect errors for ASCII transmissions. Which of the following events will always lead to an undeleted error?', 'one bit or any odd number of bits inverted in a block of data during transmission', 'two bits or any even number of bits inverted in a block during transmission', 'one bit or any odd number of bits inverted in a byte during transmission', 'two bits or any even number of bits inverted in a byte during transmission', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(478, 'Which utility is an all-purpose tool for troubleshooting TCP/IP problems?', 'NBTSTAT', 'Netstat', 'PING', 'Hostname', 'None of the above', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(479, 'In communication satellite, multiple repeaters are known as', 'detector', 'modulator', 'stations', 'transponders', 'None of the above', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(480, 'Which protocol provides e-mail facility among different hosts?', 'FTP', 'SMTP', 'TELNET', 'SNMP', 'None of these', 2, 'SMTP (Simple Mail Transfer Protocol) is a TCP/IP protocol used in sending and receiving e-mail. However, since it is limited in its ability to queue messages at the receiving end, it is usually used with one of two other protocols, POP3 or IMAP that let the user save messages in a server mailbox and download them periodically from the server. SMTP usually is implemented to operate over Internet port 25.\nMany mail servers now support Extended Simple Mail Transfer Protocol (ESMTP), which allows multimedia files to be delivered as e-mail.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(481, 'Which network protocol is used to send Email?', 'FTP', 'SSH', 'POP3', 'SMTP', 'None of these', 4, 'SMTP (Simple Mail Transfer Protocol) is a TCP/IP protocol used in sending and receiving e-mail.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(482, 'Which is the device that converts computer output into a form that can be transmitted over a telephone line?', 'Teleport', 'Multiplexer', 'Concentrator', 'Modem', '', 4, 'A modem (modulator?demodulator) is a network hardware device that modulates one or more carrier wave signals to encode digital information for transmission and demodulates signals to decode the transmitted information.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(483, 'Which of the following items is not used in Local Area Networks (LANs)', 'Computers', 'Modem', 'Printer', 'Cable', '', 2, 'A local area network (LAN) is a group of computers and associated devices that share a common communications line or wireless link to a server.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(484, 'DNS in internet technology stands for', 'Distributed Name System', 'Data Name System', 'Dynamic Name System', 'Domain Name System', 'None of the above', 4, 'The domain name system (DNS) is the way that internet domain names are located and translated into internet protocol (IP) addresses. The domain name system maps the name people use to locate a website to the IP address that a computer uses to locate a website. For example, if someone types example.com into a web browser, a server behind the scenes will map that name to the IP address 93.184.216.34', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(485, 'A technique used by codes to convert an analog signal into a digital bit stream is known as', 'Digital Signal Generator', 'Pulse Code Modulation', 'Pulse Signal Modulation', 'None of these', '', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(486, 'A program that converts computer data into some code system other than the normal one is known as', 'Emulator', 'Encoder', 'Decoder', 'Trigger', 'None of these', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(487, 'LAN stands for?', 'Last Affordable Network', 'Leased Area Network', 'Latency Around Netwok', 'Local Area Network', 'None of these', 4, 'A local area network (LAN) is a computer network that interconnects computers within a limited area such as a residence, school, laboratory, university campus or office building.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(488, 'What language does a browser typically interpret to display information from the World Wide Web?', 'Machine Code', 'Assembly Language', 'HTML', 'C++', 'None of these', 3, 'Hypertext Markup Language (HTML) is the standard markup language for creating web pages and web applications. With Cascading Style Sheets (CSS) and JavaScript, it forms a triad of cornerstone technologies for the World Wide Web.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(489, 'A wireless technology built in electronic gadgets used for exchanging data over short distances is ______', 'USB', 'Bluetooth', 'Modem', 'Wifi', 'None of these', 2, 'Bluetooth is a wireless technology standard for exchanging data over short distances (using short-wavelength UHF radio waves in the ISM band from 2.4 to 2.485 GHz) from fixed and mobile devices, and building personal area networks (PANs). Invented by Dutch electrical engineer Jaap Haartsen, working for telecom vendor Ericsson in 1994', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(490, 'Buying and selling the products over electronic systems like internet is called _______', 'Online Shopping', 'Net Banking', 'E-Commerce', 'Dgital Marketing', 'None of these', 3, 'E-commerce is the activity of buying or selling of products on online services or over the Internet. Electronic commerce draws on technologies such as mobile commerce, electronic funds transfer, supply chain management, Internet marketing, online transaction processing, electronic data interchange (EDI), inventory management systems, and automated data collection systems.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(491, '...... is collection of web pages and ...... is the very first page that we see on opening of a web-site', 'Home-page, Web-page', 'Web-site, Home-page', 'Web-page, Home-page', 'Web-page, Web-site', 'None of these', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(492, 'When the pointer is positioned on a _____ it is shaped like a hand.', 'Grammar error', 'Hyperlink', 'Screen tip', 'Spelling error', 'Formatting error', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(493, '\'www\' stands for _____', 'World Word Web', 'World Wide Web', 'World White Web', 'World Work Web', 'None of these', 2, 'The World Wide Web (WWW), also called the Web, is an information space where documents and other web resources are identified by Uniform Resource Locators (URLs), interlinked by hypertext links, and accessible via the Internet. English scientist Tim Berners-Lee invented the World Wide Web in 1989.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(494, 'The most important or powerful computer in a typical network is _____', 'Desktop', 'Network client', 'Network server', 'Network station', 'None of these', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(495, 'Which of the following is an example of connectivity?', 'Internet', 'Floppy disk', 'Power cord', 'Data', 'None of these', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(496, 'When sending an e-mail, the _____ line describes the contents of the message.', 'To', 'Subject', 'Contents', 'CC', 'None of these', 2, 'It\'s one of the first things someone sees when they receive an email, so it\'s like the first impression of sorts. The best email subject lines are usually short, descriptive and provide the recipient with a reason to open your email.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(497, 'One advantage of dial-up-internet access is ___', 'It utilizes broadband technology', 'It utilizes existing telephone service', 'It uses a router for security', 'Modem speeds are very fast', 'None of these', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(498, 'What is the term used for unsolicited e-mail?', 'News group', 'Use net', 'Backbone', 'Flaming', 'Spam', 5, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(499, 'Two or more computers connected to each other of sharing\ninformation form a _____ .', 'Server', 'Router', 'Network', 'Tunnel', 'Pipeline', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(500, 'Office LANs that are spread geographically apart on a large scale can be connected using a corporate _____ .', 'CAN', 'LAN', 'DAN', 'WAN', 'TAN', 4, 'A wide area network is a telecommunications network or computer network that extends over a large geographical distance/place.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(501, 'Which of the following is NOT a type of broad band internet connection?', 'Cable', 'DSL', 'Dial-up', 'Satellite', 'None of these', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(502, 'What does the SMTP in an SMTP server stand for?', 'Simple Mail Transfer Protocol', 'Serve Message Text Process', 'Short Messaging Text Process', 'Short Messaging Transfer Protocol', 'None of these', 1, 'SMTP (Simple Mail Transfer Protocol) is a TCP/IP protocol used in sending and receiving e-mail.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(503, 'What\'s considered the \'backbone\' of the World Wide Web?', 'Uniform resource locator (URL)', 'Hypertext mark-up language (HTML)', 'Hypertext transfer protocol (HTTP)', 'File transfer protocol (FTP)', 'None of these', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(504, 'We access the World Wide Web using:', 'Browsers', 'Instant messaging applications', 'High bandwidth', 'Search engine', 'None of these', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(505, 'A wireless network uses .......... waves to transmit signals.', 'Mechanical', 'Radio', 'Sound', 'Magnetic', 'None of these', 2, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(506, 'What device includes an adapter that decodes data sent in radio signals?', 'Modem', 'Digital Translator', 'Router', 'Switch', 'None of these', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(507, 'Computer connected to a LAN (Local Area Network) can .......', 'run faster', 'go on line', 'share information and/or share peripheral equipment', 'E-mail', 'None of these', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(508, 'In a network, the computer that stores the files and process the data is named as', 'Server', 'Terminal', 'Modem', 'All of these', 'None of these', 1, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(509, 'LAN speeds are measured in', 'BPS (Bits Per Second)', 'KBPS (Kilo Bits Per Second)', 'MBPS (Mega Bits Per Second)', 'MIPS (Million Instructions Per Second)', '', 3, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(510, 'What does FTP stand for?', 'File Transfer Protocol', 'File Transfer Program', 'File Thread Protocol', 'File Thread Program', 'None of these', 1, 'The File Transfer Protocol is a standard network protocol used for the transfer of computer files between a client and server on a computer network.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(511, 'Protocols are', 'Sets of rules', 'Sets of maps', 'Sets of computers', 'Sets of product', '', 1, 'Protocols are often described in an industry or international standard. The TCP/IP Internet protocols, a common example, consist of: Transmission Control Protocol (TCP), which uses a set of rules to exchange messages with other Internet points at the information packet level.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(512, 'When customers of a Web site are unable to access it due to a bombardment of fake traffic, it is known as:', 'A virus', 'A Trojan Horse', 'Cracking', 'A denial of service attack.', '', 4, 'None.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(513, 'A single packet on a data link is known as', 'Path', 'Frame', 'Block', 'Group', 'None of the above', 2, 'A single packet on a data link is known as frame\nPacket switching. In the OSI model of computer networking, a frame is the protocol data unit at the data link layer. Frames are the result of the final layer of encapsulation before the data is transmitted over the physical layer.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(514, 'A technique used by codes to convert an analog signal into a digital bit stream is known as', 'Pulse code modulation', 'Pulse stretcher', 'Query processing', 'Queue management', 'None of the above', 1, 'Pulse-code modulation is a method used to digitally represent sampled analog signals. It is the standard form of digital audio in computers, compact discs, digital telephony and other digital audio applications.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(515, 'A hybrid computer uses a _____ to convert   digital   signals   from   a computer into analog signals.', 'Modulator', 'Demodulator', 'Modem', 'Decoder', 'None of the above', 3, 'Modem : Modem is short for \"Modulator / Demodulator.\" It is a hardware component that allows a computer or other device, such as a router or switch, to connect to the Internet. It converts or \"modulates\" an analog signal from a telephone or cable wire to a digital signal that a computer can recognize. Similarly, it converts outgoing digital data from a computer or other device to an analog signal.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(516, 'Any device that performs signal conversion is', 'Modulator', 'Modem', 'Keyboard', 'Plotter', 'None of the above', 1, 'Modulator : In electronics and telecommunications, modulation is the process of varying one or more properties of a periodic waveform, called the carrier signal, with a modulating signal that typically contains information to be transmitted. ... A modem (from modulator?demodulator) can perform both operations.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(517, 'A type of channel used to connect a central processor and peripherals which uses multipling is known as', 'Modem', 'Network', 'Multiplexer', 'All of the above', 'None of the above', 3, 'A type of channel used to connect a central processor and peripherals which uses multipling is known as Multiplexer.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(518, 'Which network is a packet switching network?', 'Ring network', 'LAN', 'Star network', 'EuroNET', 'None of the above', 4, 'EuroNET network is a packet switching network', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0'),
(519, 'A large number of computers in a wide geographical area can be efficiently connected using', 'Twisted pair lines', 'Coaxial cables', 'Communications satellites', 'All of the above', 'None of the above', 3, 'A communications satellite is an artificial satellite that relays and amplifies radio telecommunications signals via a transponder; it creates a communication channel between a source transmitter and a receiver at different locations on Earth.', 'Computer Fundamentals', 'Computer fundamentals data communication and networking', '', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `reported_questions`
--

CREATE TABLE `reported_questions` (
  `report_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `report_by` int(11) NOT NULL,
  `report_time` datetime NOT NULL,
  `resolve_status` enum('In Progress','Resolved') NOT NULL,
  `resolve_date` datetime NOT NULL,
  `suggest_answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reported_questions`
--

INSERT INTO `reported_questions` (`report_id`, `question_id`, `report_by`, `report_time`, `resolve_status`, `resolve_date`, `suggest_answer`) VALUES
(47, 1, 3, '2022-02-13 10:52:45', 'In Progress', '0000-00-00 00:00:00', 'A'),
(48, 1, 3, '2022-02-13 10:54:25', 'In Progress', '0000-00-00 00:00:00', 'A'),
(49, 1, 3, '2022-02-13 10:54:43', 'In Progress', '0000-00-00 00:00:00', 'A'),
(50, 1, 3, '2022-02-13 10:55:30', 'In Progress', '0000-00-00 00:00:00', 'A'),
(51, 1, 3, '2022-02-13 10:56:05', 'In Progress', '0000-00-00 00:00:00', 'A'),
(52, 1, 3, '2022-02-13 10:56:58', 'In Progress', '0000-00-00 00:00:00', 'A'),
(53, 1, 3, '2022-02-13 10:57:09', 'In Progress', '0000-00-00 00:00:00', 'A'),
(54, 1, 3, '2022-02-13 10:57:39', 'In Progress', '0000-00-00 00:00:00', 'A'),
(55, 1, 3, '2022-02-13 10:58:11', 'In Progress', '0000-00-00 00:00:00', 'A'),
(56, 1, 3, '2022-02-13 10:58:32', 'In Progress', '0000-00-00 00:00:00', 'A'),
(57, 1, 3, '2022-02-13 11:34:41', 'In Progress', '0000-00-00 00:00:00', 'A'),
(58, 1, 3, '2022-02-15 15:40:12', 'In Progress', '0000-00-00 00:00:00', 'A'),
(59, 1, 3, '2022-02-15 15:40:14', 'In Progress', '0000-00-00 00:00:00', 'A'),
(60, 1, 3, '2022-02-15 15:40:15', 'In Progress', '0000-00-00 00:00:00', 'A'),
(61, 1, 3, '2022-02-15 15:40:16', 'In Progress', '0000-00-00 00:00:00', 'A'),
(62, 1, 2, '2022-02-15 20:25:21', 'In Progress', '0000-00-00 00:00:00', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `saved_questions`
--

CREATE TABLE `saved_questions` (
  `save_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `saved_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_questions`
--

INSERT INTO `saved_questions` (`save_id`, `question_id`, `saved_by`) VALUES
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`) VALUES
(1, 'Computer'),
(2, 'G.K.');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `primary_color` enum('red','pink','teal','purple','deep purple','indigo','blue','light blue','cyan','green','light green','lime','yellow','amber','orange','deep orange','brown','grey','blue grey') NOT NULL,
  `accent_color` enum('red','pink','teal','purple','deep purple','indigo','blue','light blue','cyan','green','light green','lime','yellow','amber','orange','deep orange','brown','grey','blue grey') NOT NULL,
  `guest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `primary_color`, `accent_color`, `guest_id`) VALUES
(4, 'blue', 'pink', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `branch_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `branch_name`) VALUES
(1, 'Computer Fundamentals', 'Computer Science'),
(2, 'Data Communication and Computer Network', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `state` enum('Rajasthan') NOT NULL,
  `verified` enum('yes','no') NOT NULL,
  `gender` enum('Male','Female','Transgender') NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `mobile_number`, `state`, `verified`, `gender`, `profile_pic`, `last_login_time`, `dob`) VALUES
(2, 'vkruhela123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Vikash Ruhela', '6375051814', 'Rajasthan', 'yes', 'Male', '', '2022-02-15 20:23:58', '0000-00-00'),
(3, 'guest@examocks.com', '12345678', 'Guest', '6375051814', 'Rajasthan', 'yes', 'Male', '', '2022-02-13 09:59:50', '2022-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `verification_code`
--

CREATE TABLE `verification_code` (
  `table_sr` int(11) NOT NULL,
  `verification_email` varchar(100) NOT NULL,
  `verification_code` varchar(32) NOT NULL,
  `is_expire` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification_code`
--

INSERT INTO `verification_code` (`table_sr`, `verification_email`, `verification_code`, `is_expire`) VALUES
(1, 'vkruhela123@gmail.com', '781802', 'TRUE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `branch_name` (`branch_name`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `mocks`
--
ALTER TABLE `mocks`
  ADD PRIMARY KEY (`mock_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `mock_questions`
--
ALTER TABLE `mock_questions`
  ADD PRIMARY KEY (`mock_id`,`question_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `mock_response`
--
ALTER TABLE `mock_response`
  ADD PRIMARY KEY (`mock_response_id`),
  ADD KEY `mock_response_by` (`mock_response_by`),
  ADD KEY `mock_id` (`mock_id`);

--
-- Indexes for table `mock_sections`
--
ALTER TABLE `mock_sections`
  ADD PRIMARY KEY (`section_id`,`mock_id`),
  ADD KEY `mock_id` (`mock_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `reported_questions`
--
ALTER TABLE `reported_questions`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `report_by` (`report_by`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `saved_questions`
--
ALTER TABLE `saved_questions`
  ADD PRIMARY KEY (`save_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `saved_by` (`saved_by`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `branch_name` (`branch_name`),
  ADD KEY `subject_name` (`subject_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_code`
--
ALTER TABLE `verification_code`
  ADD PRIMARY KEY (`table_sr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mocks`
--
ALTER TABLE `mocks`
  MODIFY `mock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mock_response`
--
ALTER TABLE `mock_response`
  MODIFY `mock_response_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT for table `reported_questions`
--
ALTER TABLE `reported_questions`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `saved_questions`
--
ALTER TABLE `saved_questions`
  MODIFY `save_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `verification_code`
--
ALTER TABLE `verification_code`
  MODIFY `table_sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mocks`
--
ALTER TABLE `mocks`
  ADD CONSTRAINT `mocks_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`);

--
-- Constraints for table `mock_questions`
--
ALTER TABLE `mock_questions`
  ADD CONSTRAINT `mock_questions_ibfk_1` FOREIGN KEY (`mock_id`) REFERENCES `mocks` (`mock_id`),
  ADD CONSTRAINT `mock_questions_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  ADD CONSTRAINT `mock_questions_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`);

--
-- Constraints for table `mock_response`
--
ALTER TABLE `mock_response`
  ADD CONSTRAINT `mock_response_ibfk_1` FOREIGN KEY (`mock_response_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mock_response_ibfk_2` FOREIGN KEY (`mock_id`) REFERENCES `mocks` (`mock_id`);

--
-- Constraints for table `mock_sections`
--
ALTER TABLE `mock_sections`
  ADD CONSTRAINT `mock_sections_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`),
  ADD CONSTRAINT `mock_sections_ibfk_3` FOREIGN KEY (`mock_id`) REFERENCES `mocks` (`mock_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `subject` (`subject_name`);

--
-- Constraints for table `reported_questions`
--
ALTER TABLE `reported_questions`
  ADD CONSTRAINT `reported_questions_ibfk_1` FOREIGN KEY (`report_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reported_questions_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);

--
-- Constraints for table `saved_questions`
--
ALTER TABLE `saved_questions`
  ADD CONSTRAINT `saved_questions_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  ADD CONSTRAINT `saved_questions_ibfk_2` FOREIGN KEY (`saved_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD CONSTRAINT `site_settings_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`branch_name`) REFERENCES `branch` (`branch_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
