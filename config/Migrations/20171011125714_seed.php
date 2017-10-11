<?php
use Migrations\AbstractMigration;

class Seed extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('users')
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('full_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('is_superuser', 'boolean', [
                'after' => 'start_date',
                'default' => false,
                'length' => null,
                'null' => false,
            ])
            ->addColumn('posts_count', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex('username')
            ->create();

        $this->execute("
          INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `is_superuser`, `posts_count`, `created`, `modified`) VALUES
            (1, 'admin', '$2y$10\$f8iTteZfTMr/fqoWS1.6bOFd4GwlJpSoKfaTXyIWbiN6zbrm/BsJ2', 'John Doe', 1, 15, '2017-07-11 00:00:00', '2017-07-11 00:00:00'),
            (2, 'user', '$2y$10\$f8iTteZfTMr/fqoWS1.6bOFd4GwlJpSoKfaTXyIWbiN6zbrm/BsJ2', 'Just User', 0, 0, '2017-07-11 00:00:00', '2017-07-11 00:00:00');
        ");

        $this->execute("
            INSERT INTO `forum_categories` (`id`, `parent_id`, `last_post_id`, `lft`, `rght`, `title`, `slug`, `description`, `threads_count`, `replies_count`, `is_visible`, `created`, `modified`) VALUES
            (1, NULL, NULL, 1, 8, 'Hardware and Technology', 'hardware-and-technology', '', 0, 0, 1, '2017-07-10 20:08:21', '2017-10-11 12:51:23'),
            (2, 1, 24, 2, 3, 'CPUs and Overclocking', 'cpus-andoverclocking', '', 7, 11, 1, '2017-07-10 20:08:41', '2017-10-11 14:44:25'),
            (3, NULL, NULL, 17, 26, 'Consumer Electronics', 'consumer-electronics', '', 0, 0, 1, '2017-07-10 20:08:58', '2017-07-13 15:50:28'),
            (4, 1, NULL, 6, 7, 'Motherboards', 'motherboards', '', 0, 0, 1, '2017-07-10 20:09:15', '2017-07-24 14:42:49'),
            (5, NULL, NULL, 9, 16, 'Software', 'software', '', 0, 0, 1, '2017-07-13 15:50:37', '2017-07-27 13:01:03'),
            (6, 1, NULL, 4, 5, 'Memory and Storage', 'memory-and-storage', '', 0, 0, 1, '2017-07-13 15:51:28', '2017-07-13 15:51:49'),
            (7, 3, 5, 18, 19, 'Digital and Video Cameras', 'digital-and-video-cameras', '', 1, 0, 1, '2017-07-13 15:52:10', '2017-10-11 14:44:25'),
            (8, 3, NULL, 20, 21, 'Mobile Devices and Gadgets', 'mobile-devices-and-gadgets', '', 0, 0, 1, '2017-07-13 15:53:49', '2017-07-13 15:53:49'),
            (9, 3, NULL, 22, 23, 'Home Theater', 'home-theater', '', 0, 0, 1, '2017-07-13 15:54:27', '2017-07-13 15:54:27'),
            (10, 5, NULL, 10, 11, 'Software for Windows', 'software-for-windows', '', 0, 0, 1, '2017-07-13 15:54:40', '2017-07-13 15:54:40'),
            (11, 5, NULL, 12, 13, 'All Things Apple', 'all-things-apple', '', 0, 0, 1, '2017-07-13 15:54:50', '2017-07-13 15:54:50'),
            (12, 5, NULL, 14, 15, 'Operating Systems', 'operating-systems', '', 0, 0, 1, '2017-07-13 15:55:02', '2017-07-13 15:55:02'),
            (13, 3, NULL, 24, 25, 'Invisible category', 'invisible-category', '', 0, 0, 0, '2017-07-14 11:57:02', '2017-07-14 11:57:02');
        ");

        $this->execute("
            INSERT INTO `forum_posts` (`id`, `parent_id`, `category_id`, `last_reply_id`, `user_id`, `title`, `slug`, `message`, `replies_count`, `reports_count`, `likes_count`, `is_sticky`, `is_locked`, `is_visible`, `last_reply_created`, `created`, `modified`) VALUES
            (1, NULL, 2, 24, 1, 'Overclocking CPU/GPU/Memory Stability Testing Guidelines uuu', 'overclocking-cpu-gpu-memory-stability-testing-guidelines', 'Must run with the IBT thread count set equal to the physical core count of the CPU.\r\nHT slows it down and reduces the ability to determine stability. Set to 4 threads on a 2600K.\r\nSet memory to \"All\".\r\nStability Criterion: Must pass 5 cycles minimum, passing 20 cycles is preferred (considered gold standard)\r\naaa', 4, 1, 0, 1, 0, 1, '2017-10-11 12:28:05', '2017-07-14 11:00:55', '2017-10-11 14:44:25'),
            (2, 1, 2, NULL, 1, '', '', 'Like others have said, sticky please!\r\n\r\nAbout the Prime95 Large FFT, I\'ve gotten crashes on my Phenom II on Blend that I haven\'t gotten on Large FFT. This required me to run it 24 hours with crashes happening on the 20th hour a lot of times. These crashes were fixed by increasing increasing CPU or CPU-NB volts or downing the CPU or CPU-NB clock speeds.', 0, 1, 0, 0, 0, 1, NULL, '2017-07-14 11:01:45', '2017-07-14 11:01:45'),
            (3, NULL, 2, 6, 1, '7700K vs 7800X Techspot review', '7700k-vs-7800x-techspot-review', 'Obviously it is 1080p and will not matter much in 4K, but that is some really bad numbers for the 7800X.', 1, 0, 0, 0, 1, 1, '2017-07-14 11:28:31', '2017-07-14 11:27:10', '2017-10-11 14:44:25'),
            (4, NULL, 2, 8, 1, 'Anandtech：Intel\'s Skylake-SP Xeon VS AMD\'s EPYC 7000', 'anandtech-intels-skylake-sp-xeon-vs-amds-epyc-7000', 'With the exception of database software and vectorizable HPC code, AMD\'s EPYC 7601 ($4200) offers slightly less or slightly better performance than Intel\'s Xeon 8176 ($8000+).', 2, 0, 0, 0, 0, 1, '2017-07-14 11:29:28', '2017-07-14 11:27:39', '2017-10-11 14:44:25'),
            (5, NULL, 7, NULL, 1, '16C/16T Intel Atom C3955 (Goldmont core) – Denverton platform benchmark leaked', '16c-16t-intel-atom-c3955-goldmont-core-denverton-platform-benchmark-leaked', 'SiSoftware Sandra 22.20 - Processor Multi-Media - Windows x64 10.0.6\r\n\r\n• Intel Atom(TM) CPU C3955 @ 2.10GHz (16C 2.1GHz, 8x 2MB L2 cache, Goldmont - Denverton 31W TDP): 229.47Mpix/s\r\nsource: ranker.sisoftware.net\r\n\r\nfor comparation:\r\n\r\n• AMD FX(tm)-8350 Eight-Core Processor (4M 8T 4.84GHz, 2.63GHz IMC, 4x 2MB L2 cache, 8MB L3 cache, Steamroller 125W TDP): 223.16Mpix/s\r\nsource: ranker.sisoftware.net', 0, 0, 0, 0, 0, 1, '2017-07-14 11:28:11', '2017-07-14 11:28:11', '2017-07-25 11:41:04'),
            (6, 3, 2, NULL, 1, '', '', 'Is this targeted at data center use because it doesn\'t make much sense for anything else. Maybe a hedge against ARM?', 0, 0, 0, 0, 0, 1, NULL, '2017-07-14 11:28:31', '2017-07-14 11:28:31'),
            (7, 4, 2, NULL, 1, '', '', 'Those prices though! :(\r\n\r\nPlanned on buying a Gold 6000 series, until today. Now I may have to settle for a Silver 4110.', 0, 0, 0, 0, 0, 1, NULL, '2017-07-14 11:29:15', '2017-07-14 11:29:15'),
            (8, 4, 2, NULL, 1, '', '', 'Good article good read, glad AMD is finally back in the game.', 0, 0, 0, 0, 0, 1, NULL, '2017-07-14 11:29:28', '2017-07-14 11:29:28'),
            (9, NULL, 2, 16, 1, 'new thread', 'new-thread2', 'asdfasdfasdf', 3, 0, 0, 0, 0, 1, '2017-07-17 15:17:44', '2017-07-17 14:15:15', '2017-10-11 14:44:25'),
            (10, NULL, 2, NULL, 1, 'another thread', 'another-thread', 'asdgdsfg', 0, 0, 0, 0, 0, 1, '2017-07-17 14:16:31', '2017-07-17 14:16:31', '2017-07-17 14:16:31'),
            (11, NULL, 2, 12, 1, 'one more thread', 'one-more-thread', 'fgsdfgdf', 1, 0, 0, 0, 0, 1, '2017-07-17 14:48:54', '2017-07-17 14:17:16', '2017-10-11 14:44:25'),
            (12, 11, 2, NULL, 1, '', '', 'reply asdfasdf ', 0, 0, 0, 0, 0, 1, NULL, '2017-07-17 14:48:54', '2017-07-17 14:48:54'),
            (13, 9, 2, NULL, 1, '', '', 'gggg', 0, 0, 0, 0, 0, 1, NULL, '2017-07-17 14:56:48', '2017-07-17 14:56:48'),
            (14, 9, 2, NULL, 1, '', '', 'aaaa', 0, 0, 0, 0, 0, 1, NULL, '2017-07-17 14:58:06', '2017-07-17 14:58:06'),
            (16, 9, 2, NULL, 1, '', '', 'asdfasdf', 0, 0, 0, 0, 0, 1, NULL, '2017-07-17 15:17:44', '2017-07-17 15:17:44'),
            (20, 1, 2, NULL, 1, '', '', 'asdfasdf', 0, 1, 0, 0, 0, 1, NULL, '2017-07-18 11:40:29', '2017-07-18 11:40:29'),
            (21, 1, 2, NULL, 1, '', '', 'asdfasdf', 0, 0, 0, 0, 0, 1, NULL, '2017-07-18 11:41:58', '2017-07-18 11:41:58'),
            (23, NULL, 2, NULL, 1, 'asdfasdfasdfasdf', 'asdfasdfasdfasdf', 'asdfasdf', 0, 0, 0, 0, 0, 1, '2017-07-18 14:43:21', '2017-07-18 14:43:21', '2017-07-18 14:43:21'),
            (24, 1, 2, NULL, 2, '', '', 'test ggg', 0, 0, 0, 0, 0, 1, NULL, '2017-10-11 12:28:05', '2017-10-11 12:28:17');
        ");

        $this->execute("
          INSERT INTO `forum_likes` (`id`, `post_id`, `user_id`, `created`, `modified`) VALUES
            (1, 1, 1, '2017-07-20 12:13:01', '2017-07-20 12:13:01'),
            (2, 2, 1, '2017-07-20 12:26:22', '2017-07-20 12:26:22');
        ");

        $this->execute("
          INSERT INTO `forum_moderators` (`id`, `category_id`, `user_id`, `created`, `modified`) VALUES
            (2, 2, 1, '2017-07-19 13:53:20', '2017-07-19 13:53:20');
        ");

        $this->execute("
          INSERT INTO `forum_reports` (`id`, `post_id`, `user_id`, `message`, `created`, `modified`) VALUES
            (2, 1, 1, 'a sdfa sdfasdf asdf', '2017-07-18 14:42:56', '2017-07-18 14:42:56'),
            (3, 2, 1, 'as dfasd fasd', '2017-07-18 15:03:57', '2017-07-18 15:03:57'),
            (4, 20, 1, 'asdfasdf', '2017-07-27 12:25:26', '2017-07-27 12:25:26');
        ");
    }
}
