<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181015135418 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE stats (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, health INTEGER NOT NULL, attack INTEGER NOT NULL, magic INTEGER NOT NULL, defense INTEGER NOT NULL, resistance INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE stats_modifier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, health_modifier INTEGER NOT NULL, attack_modifier INTEGER NOT NULL, magic_modifier INTEGER NOT NULL, defense_modifier INTEGER NOT NULL, resistance_modifier INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE unit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, unit_class_id INTEGER NOT NULL, stats_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, level INTEGER NOT NULL, sex BOOLEAN NOT NULL, mugshot VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_DCBB0C539F3EE182 ON unit (unit_class_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DCBB0C5370AA3482 ON unit (stats_id)');
        $this->addSql('CREATE TABLE unit_class (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, stats_modifier_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_66796794FBFA809 ON unit_class (stats_modifier_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE stats');
        $this->addSql('DROP TABLE stats_modifier');
        $this->addSql('DROP TABLE unit');
        $this->addSql('DROP TABLE unit_class');
    }
}
