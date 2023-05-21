<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230521161026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artists ADD agent_id INT NOT NULL');
        $this->addSql('ALTER TABLE artists ADD CONSTRAINT FK_68D3801E3414710B FOREIGN KEY (agent_id) REFERENCES agents (id)');
        $this->addSql('CREATE INDEX IDX_68D3801E3414710B ON artists (agent_id)');
        $this->addSql('ALTER TABLE locations CHANGE adress adress VARCHAR(255) DEFAULT NULL, CHANGE website website VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE shows CHANGE poster_url poster_url VARCHAR(255) DEFAULT NULL, CHANGE price price NUMERIC(12, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artists DROP FOREIGN KEY FK_68D3801E3414710B');
        $this->addSql('DROP INDEX IDX_68D3801E3414710B ON artists');
        $this->addSql('ALTER TABLE artists DROP agent_id');
        $this->addSql('ALTER TABLE locations CHANGE adress adress VARCHAR(255) DEFAULT \'NULL\', CHANGE website website VARCHAR(255) DEFAULT \'NULL\', CHANGE phone phone VARCHAR(30) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE shows CHANGE poster_url poster_url VARCHAR(255) DEFAULT \'NULL\', CHANGE price price NUMERIC(12, 2) DEFAULT \'NULL\'');
    }
}
