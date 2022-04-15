<?php
class Vinyl
{

    // Connection
    private $conn;

    // Table
    private $db_table = "vinyls";

    // Columns
    public  ?int $id;
    public  ?string $picture_link;
    public  ?string $title;
    public  ?string $band;
    public  ?string $year_release;
    public  ?string $genre;
    public  ?string $description;
    public  ?bool $available;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET ALL
    public function getVinyls()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;

        //////


    }

    // CREATE
    public function createVinyl()
    {
        $sqlQuery = "INSERT INTO " . $this->db_table . "
                        SET
                        picture_link = :picture_link, 
                        title = :title, 
                        band = :band, 
                        year_release = :year_release, 
                        genre = :genre,
                        description = :decription,
                        available = :available
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->picture_link = strip_tags($this->picture_link);
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->band = htmlspecialchars(strip_tags($this->band));
        $this->year_release = strip_tags($this->year_release);
        $this->genre = htmlspecialchars(strip_tags($this->genre));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->available = htmlspecialchars(strip_tags($this->available));

        // bind data and execute
        
        if ($stmt->execute([
            ":picture_link" => $this->picture_link,
            ":title" => $this->title,
            ":band" => $this->band,
            ":year_release" => $this->year_release,
            ":genre" => $this->genre,
            ":decription" => $this->description,
            ":available" => $this->available
        ])) {
            return true;
        } else {
            return false;
        }
    }

    // UPDATE
    public function getSingleVinyl()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "
                    WHERE 
                       id = ?
                    LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->picture_link = $dataRow['picture_link'];
        $this->title = $dataRow['title'];
        $this->band = $dataRow['band'];
        $this->year_release = $dataRow['year_release'];
        $this->genre = $dataRow['genre'];
        $this->description = $dataRow['description'];
        $this->available = $dataRow['available'];
    }

    // UPDATE
    public function updateVinyl()
    {
        $sqlQuery = "UPDATE
                        " . $this->db_table . "
                    SET
                    picture_link = :picture_link, 
                    title = :title, 
                    band = :band, 
                    year_release = :year_release, 
                    genre = :genre,
                    description = :decription,
                    available = :available
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->picture_link = htmlspecialchars(strip_tags($this->picture_link));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->band = htmlspecialchars(strip_tags($this->band));
        $this->year_release = htmlspecialchars(strip_tags($this->year_release));
        $this->genre = htmlspecialchars(strip_tags($this->genre));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->available = htmlspecialchars(strip_tags($this->available));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind data and execute
        

        if ($stmt->execute([
            ":id" => $this->id,
            ":picture_link" => $this->picture_link,
            ":title" => $this->title,
            ":band" => $this->band,
            ":year_release" => $this->year_release,
            ":genre" => $this->genre,
            ":decription" => $this->description,
            ":available" => $this->available
        ])) {
            return true;
        }
        return false;
    }

    // DELETE
    function deleteVinyl()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = $this->id;

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
