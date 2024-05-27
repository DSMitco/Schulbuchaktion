<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502064207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, article_name VARCHAR(255) NOT NULL, article_price VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, subject_id INT DEFAULT NULL, publisher_id INT DEFAULT NULL, bnr NUMERIC(10, 0) NOT NULL, short_title VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, listtype NUMERIC(10, 0) DEFAULT NULL, school_form NUMERIC(10, 0) NOT NULL, teacherversion TINYINT(1) DEFAULT NULL, info VARCHAR(255) DEFAULT NULL, ebook TINYINT(1) DEFAULT 0 NOT NULL, ebook_plus TINYINT(1) DEFAULT 0 NOT NULL, mainbook_id NUMERIC(10, 0) DEFAULT NULL, bookprice DOUBLE PRECISION DEFAULT NULL, INDEX IDX_CBE5A33123EDC87 (subject_id), INDEX IDX_CBE5A33140C86FCE (publisher_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_schoolgrade (book_id INT NOT NULL, schoolgrade_id INT NOT NULL, INDEX IDX_17A04EBE16A2B381 (book_id), INDEX IDX_17A04EBE187E724D (schoolgrade_id), PRIMARY KEY(book_id, schoolgrade_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bookorder (book_order_id INT AUTO_INCREMENT NOT NULL, schoolclass_id INT NOT NULL, book_id INT NOT NULL, count NUMERIC(10, 0) NOT NULL, teacher_copy TINYINT(1) DEFAULT 0 NOT NULL, ebook TINYINT(1) DEFAULT 0 NOT NULL, ebook_plus TINYINT(1) DEFAULT 0 NOT NULL, INDEX IDX_B191A88BC67D8F5 (schoolclass_id), INDEX IDX_B191A88B16A2B381 (book_id), PRIMARY KEY(book_order_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (department_id INT AUTO_INCREMENT NOT NULL, head_of_department INT NOT NULL, name VARCHAR(255) NOT NULL, budget NUMERIC(10, 0) NOT NULL, used_budget NUMERIC(10, 0) NOT NULL, umew NUMERIC(10, 0) NOT NULL, UNIQUE INDEX UNIQ_CD1DE18A150337F3 (head_of_department), PRIMARY KEY(department_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publisher (publisher_id INT AUTO_INCREMENT NOT NULL, vnr NUMERIC(10, 0) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(publisher_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schoolclass (schoolclass_id INT AUTO_INCREMENT NOT NULL, department_id INT NOT NULL, name VARCHAR(255) NOT NULL, grade NUMERIC(10, 0) NOT NULL, students_amount NUMERIC(10, 0) NOT NULL, rep_amount NUMERIC(10, 0) NOT NULL, used_budget NUMERIC(10, 0) NOT NULL, budget NUMERIC(10, 0) NOT NULL, year NUMERIC(10, 0) NOT NULL, profile NUMERIC(10, 0) NOT NULL, INDEX IDX_F146B669AE80F5DF (department_id), PRIMARY KEY(schoolclass_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schoolgrade (id INT AUTO_INCREMENT NOT NULL, grade NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (subject_id INT AUTO_INCREMENT NOT NULL, head_of_subject_id INT NOT NULL, short_name VARCHAR(255) DEFAULT \'Nicht Angegeben\' NOT NULL, full_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FBCE3E7ADA200AFE (head_of_subject_id), PRIMARY KEY(subject_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (user_id INT AUTO_INCREMENT NOT NULL, short_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, token VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33123EDC87 FOREIGN KEY (subject_id) REFERENCES subject (subject_id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33140C86FCE FOREIGN KEY (publisher_id) REFERENCES publisher (publisher_id)');
        $this->addSql('ALTER TABLE book_schoolgrade ADD CONSTRAINT FK_17A04EBE16A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_schoolgrade ADD CONSTRAINT FK_17A04EBE187E724D FOREIGN KEY (schoolgrade_id) REFERENCES schoolgrade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bookorder ADD CONSTRAINT FK_B191A88BC67D8F5 FOREIGN KEY (schoolclass_id) REFERENCES schoolclass (schoolclass_id)');
        $this->addSql('ALTER TABLE bookorder ADD CONSTRAINT FK_B191A88B16A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18A150337F3 FOREIGN KEY (head_of_department) REFERENCES `user` (user_id)');
        $this->addSql('ALTER TABLE schoolclass ADD CONSTRAINT FK_F146B669AE80F5DF FOREIGN KEY (department_id) REFERENCES department (department_id)');
        $this->addSql('ALTER TABLE subject ADD CONSTRAINT FK_FBCE3E7ADA200AFE FOREIGN KEY (head_of_subject_id) REFERENCES `user` (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33123EDC87');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33140C86FCE');
        $this->addSql('ALTER TABLE book_schoolgrade DROP FOREIGN KEY FK_17A04EBE16A2B381');
        $this->addSql('ALTER TABLE book_schoolgrade DROP FOREIGN KEY FK_17A04EBE187E724D');
        $this->addSql('ALTER TABLE bookorder DROP FOREIGN KEY FK_B191A88BC67D8F5');
        $this->addSql('ALTER TABLE bookorder DROP FOREIGN KEY FK_B191A88B16A2B381');
        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18A150337F3');
        $this->addSql('ALTER TABLE schoolclass DROP FOREIGN KEY FK_F146B669AE80F5DF');
        $this->addSql('ALTER TABLE subject DROP FOREIGN KEY FK_FBCE3E7ADA200AFE');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_schoolgrade');
        $this->addSql('DROP TABLE bookorder');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE publisher');
        $this->addSql('DROP TABLE schoolclass');
        $this->addSql('DROP TABLE schoolgrade');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE `user`');
    }
}
