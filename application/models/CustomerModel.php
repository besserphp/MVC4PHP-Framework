<?php

/**
 * @package     MVC4PHP
 * @version     1.1.1
 * @link        http://www.mvc4php.com
 * @license     GPL/GNU 3.0 - http://mvc4php.com/license.txt
 * @author      Vedat Yildirim <info@vedatyildirim.com>
 * @copyright   (c) 2014-2016, VEDYWEB (www.vedyweb.com) 
 */

/**
 * Class customerModel
 * This is for Database.
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 */
class customerModel extends Model {

    // @var int $id Id
    private $id = "id";
    // @var string $firma Firma
    private $firma = "firma";
    // @var string $firstname Firstname
    private $firstname = "firstname";
    // @var string $lastname Lastname
    private $lastname = "lastname";
    // @var string $status Status
    private $status = "status";
    // @var string $contact Contact
    private $contact = "contact";

    /**
     * Get all customer from Database
     * @param int $id Id
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     */
    public function readData() {
        // Database Query
        $sql = "SELECT {$this->id}, {$this->firma}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} FROM customer";
        $query = $this->db->prepare($sql);
        $query->execute();
        // fetchAll() (@param All Data) is the PDO method that gets all result rows, here in object-style because we defined this in
        return $query->fetchAll();
    }

    /**
     * Add a customer in Database
     * @param int $id Id
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     */
    public function addData($id, $firma, $firstname, $lastname, $status, $contact) {
        // Database Query
        $sql = "INSERT INTO customer ( {$this->id}, {$this->firma}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} ) VALUES ( :id, :firma, :firstname, :lastname, :status, :contact )";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id, ':firma' => $firma, ':firstname' => $firstname, ':lastname' => $lastname, ':status' => $status, ':contact' => $contact);
        $query->execute($parameters);
    }

    /*     * ;
     * Get a customer from Database
     * @param int $id Id
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     */

    public function editData($id) {
        // Database Query          
        $sql = "SELECT {$this->id}, {$this->firma}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} FROM customer WHERE {$this->id} = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Edit/Update a customer in Database
     * @param int $id Id
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     */
    public function updateData($id, $firma, $firstname, $lastname, $status, $contact) {
        // Database Query 
        $sql = "UPDATE customer SET {$this->id} = :id, {$this->firma} = :firma, {$this->firstname} = :firstname, {$this->lastname} = :lastname, {$this->status} = :status, {$this->contact} = :contact WHERE {$this->id} = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id, ':firma' => $firma, ':firstname' => $firstname, ':lastname' => $lastname, ':status' => $status, ':contact' => $contact);
        $query->execute($parameters);
    }

    /**
     * Delete a  customer in Database
     */
    public function deleteData($id) {
        // Database Query
        $sql = "DELETE FROM customer WHERE {$this->id} = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
    }

    /**
     * Atmount a  customer from Database
     * @param amount_of_data $amount_of_data Amount of data;
     */
    public function amountData() {
        // Database Query 
        $sql = "SELECT COUNT({$this->id}) FROM customer";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    /**
     * Close Database Connection
     */
    public function __destruct() {
        // Close Database Connection
        $this->db = null;
    }

}
