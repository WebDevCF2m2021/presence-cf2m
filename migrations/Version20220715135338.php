<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220715135338 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialevents DROP FOREIGN KEY FK_758115978694366F');
        $this->addSql('CREATE TABLE holiday (id INT UNSIGNED AUTO_INCREMENT NOT NULL, day DATE NOT NULL, holidayperiod INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE holiday_promotions (holiday_id INT UNSIGNED NOT NULL, promotions_id INT UNSIGNED NOT NULL, INDEX IDX_95E90825830A3EC0 (holiday_id), INDEX IDX_95E9082510007789 (promotions_id), PRIMARY KEY(holiday_id, promotions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE holiday_promotions ADD CONSTRAINT FK_95E90825830A3EC0 FOREIGN KEY (holiday_id) REFERENCES holiday (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE holiday_promotions ADD CONSTRAINT FK_95E9082510007789 FOREIGN KEY (promotions_id) REFERENCES promotions (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE specialeventtype');
        $this->addSql('DROP INDEX IDX_758115978694366F ON specialevents');
        $this->addSql('ALTER TABLE specialevents DROP specialeventtype_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE holiday_promotions DROP FOREIGN KEY FK_95E90825830A3EC0');
        $this->addSql('CREATE TABLE specialeventtype (id INT UNSIGNED AUTO_INCREMENT NOT NULL, eventname VARCHAR(45) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE holiday');
        $this->addSql('DROP TABLE holiday_promotions');
        $this->addSql('ALTER TABLE specialevents ADD specialeventtype_id_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE specialevents ADD CONSTRAINT FK_758115978694366F FOREIGN KEY (specialeventtype_id_id) REFERENCES specialeventtype (id)');
        $this->addSql('CREATE INDEX IDX_758115978694366F ON specialevents (specialeventtype_id_id)');
    }
}
