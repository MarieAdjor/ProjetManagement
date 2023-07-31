<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230730133558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambres DROP FOREIGN KEY FK_36C92962D9A7F869');
        $this->addSql('DROP INDEX IDX_36C92962D9A7F869 ON chambres');
        $this->addSql('ALTER TABLE chambres DROP reservations_id');
        $this->addSql('ALTER TABLE reservation ADD chambre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559B177F54 FOREIGN KEY (chambre_id) REFERENCES chambres (id)');
        $this->addSql('CREATE INDEX IDX_42C849559B177F54 ON reservation (chambre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambres ADD reservations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chambres ADD CONSTRAINT FK_36C92962D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_36C92962D9A7F869 ON chambres (reservations_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559B177F54');
        $this->addSql('DROP INDEX IDX_42C849559B177F54 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP chambre_id');
    }
}
