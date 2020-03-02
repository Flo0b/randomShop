<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200229230254 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE discount_rules_products (discount_rules_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_6A1D3E3D916FBADB (discount_rules_id), INDEX IDX_6A1D3E3D6C8A81A9 (products_id), PRIMARY KEY(discount_rules_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE discount_rules_products ADD CONSTRAINT FK_6A1D3E3D916FBADB FOREIGN KEY (discount_rules_id) REFERENCES discount_rules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE discount_rules_products ADD CONSTRAINT FK_6A1D3E3D6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE discounted_price discounted_price DOUBLE PRECISION DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE discount_rules CHANGE rule_expression rule_expression VARCHAR(255) DEFAULT NULL, CHANGE discount_percent discount_percent SMALLINT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE discount_rules_products');
        $this->addSql('ALTER TABLE discount_rules CHANGE rule_expression rule_expression VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE discount_percent discount_percent SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE products CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE discounted_price discounted_price DOUBLE PRECISION DEFAULT \'NULL\', CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
