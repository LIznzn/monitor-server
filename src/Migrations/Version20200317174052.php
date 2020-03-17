<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200317174052 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE node_log (id INT AUTO_INCREMENT NOT NULL, node_id INT NOT NULL, time DATETIME NOT NULL, load_sys INT DEFAULT NULL, load_cpu INT DEFAULT NULL, load_io INT DEFAULT NULL, ram_usage BIGINT DEFAULT NULL, swap_usage INT DEFAULT NULL, disk_usage BIGINT DEFAULT NULL, tx_gap INT DEFAULT NULL, rx_gap INT DEFAULT NULL, INDEX IDX_FC1A4ABE460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE node (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, create_time DATETIME DEFAULT NULL, update_time DATETIME DEFAULT NULL, version VARCHAR(255) DEFAULT NULL, uptime INT DEFAULT NULL, sessions INT DEFAULT NULL, processes INT DEFAULT NULL, file_handles BIGINT DEFAULT NULL, file_handles_limit BIGINT DEFAULT NULL, host_name VARCHAR(255) DEFAULT NULL, os_kernel VARCHAR(255) DEFAULT NULL, os_name VARCHAR(255) DEFAULT NULL, os_arch VARCHAR(32) DEFAULT NULL, cpu_name VARCHAR(255) DEFAULT NULL, cpu_cores INT DEFAULT NULL, cpu_freq INT DEFAULT NULL, ram_total INT DEFAULT NULL, ram_usage INT DEFAULT NULL, swap_total INT DEFAULT NULL, swap_usage INT DEFAULT NULL, disk_total BIGINT DEFAULT NULL, disk_usage BIGINT DEFAULT NULL, connections INT DEFAULT NULL, nic VARCHAR(128) DEFAULT NULL, ipv4 VARCHAR(255) DEFAULT NULL, ipv6 VARCHAR(255) DEFAULT NULL, rx BIGINT DEFAULT NULL, tx BIGINT DEFAULT NULL, rx_gap INT DEFAULT NULL, tx_gap INT DEFAULT NULL, load1 DOUBLE PRECISION DEFAULT NULL, load5 DOUBLE PRECISION DEFAULT NULL, load15 DOUBLE PRECISION DEFAULT NULL, load_sys INT DEFAULT NULL, load_cpu INT DEFAULT NULL, load_io INT DEFAULT NULL, processes_list LONGTEXT DEFAULT NULL, disk_list LONGTEXT DEFAULT NULL, note LONGTEXT DEFAULT NULL, uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_857FE845A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE node_alert (id INT AUTO_INCREMENT NOT NULL, node_id INT NOT NULL, time DATETIME NOT NULL, level TINYINT(1) DEFAULT NULL, info VARCHAR(512) DEFAULT NULL, INDEX IDX_E56D43D460D9FD7 (node_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE node_log ADD CONSTRAINT FK_FC1A4ABE460D9FD7 FOREIGN KEY (node_id) REFERENCES node (id)');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE845A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE node_alert ADD CONSTRAINT FK_E56D43D460D9FD7 FOREIGN KEY (node_id) REFERENCES node (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE node DROP FOREIGN KEY FK_857FE845A76ED395');
        $this->addSql('ALTER TABLE node_log DROP FOREIGN KEY FK_FC1A4ABE460D9FD7');
        $this->addSql('ALTER TABLE node_alert DROP FOREIGN KEY FK_E56D43D460D9FD7');
        $this->addSql('DROP TABLE node_log');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE node');
        $this->addSql('DROP TABLE node_alert');
    }
}
