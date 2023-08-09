<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230809113128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE objet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objet_entrepot (objet_id INT NOT NULL, entrepot_id INT NOT NULL, INDEX IDX_69D5F068F520CF5A (objet_id), INDEX IDX_69D5F06872831E97 (entrepot_id), PRIMARY KEY(objet_id, entrepot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE objet_entrepot ADD CONSTRAINT FK_69D5F068F520CF5A FOREIGN KEY (objet_id) REFERENCES objet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE objet_entrepot ADD CONSTRAINT FK_69D5F06872831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE objet_entrepot DROP FOREIGN KEY FK_69D5F068F520CF5A');
        $this->addSql('ALTER TABLE objet_entrepot DROP FOREIGN KEY FK_69D5F06872831E97');
        $this->addSql('DROP TABLE objet');
        $this->addSql('DROP TABLE objet_entrepot');
    }
}
