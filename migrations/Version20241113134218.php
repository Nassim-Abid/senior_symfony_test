<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241113134218 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE player ADD team_id CHAR(36) DEFAULT NULL');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_player_team FOREIGN KEY (team_id) REFERENCES team (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_player_team');
        $this->addSql('ALTER TABLE player DROP team_id');
    }
}
