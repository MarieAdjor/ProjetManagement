<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230730132610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambres DROP FOREIGN KEY FK_36C92962B83297E7');
        $this->addSql('DROP INDEX IDX_36C92962B83297E7 ON chambres');
        $this->addSql('ALTER TABLE chambres CHANGE reservation_id reservations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chambres ADD CONSTRAINT FK_36C92962D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_36C92962D9A7F869 ON chambres (reservations_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambres DROP FOREIGN KEY FK_36C92962D9A7F869');
        $this->addSql('DROP INDEX IDX_36C92962D9A7F869 ON chambres');
        $this->addSql('ALTER TABLE chambres CHANGE reservations_id reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chambres ADD CONSTRAINT FK_36C92962B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_36C92962B83297E7 ON chambres (reservation_id)');
    }
}
