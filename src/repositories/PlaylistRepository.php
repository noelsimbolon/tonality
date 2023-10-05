<?php

namespace repositories;

use bases\BaseRepository;
use cores\Application;
use PDOException;

class PlaylistRepository extends BaseRepository
{
    protected static BaseRepository $instance;

    public static function tableName(): string
    {
        return 'playlists';
    }

    public static function attributes(): array
    {
        return [
            'user_id',
            'playlist_name',
            'description',
            'cover_url'
        ];
    }

    public static function primaryKey(): string
    {
        return 'playlist_id';
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function getPlaylistsByUserId($user_id)
    {
        return $this->findOne(where: ["user_id" => $user_id]);
    }

    public function getPlaylistByName($playlist_name)
    {
        return $this->findAll(where: ["playlist_name" => $playlist_name]);
    }

    public function getSongsFromPlaylist($playlist_id): bool|array
    {
        try {
            $query = "SELECT * FROM songs WHERE playlist_id = :playlist_id";
            $stmt = Application::$app->db->prepare($query);

            $stmt->bindParam(':playlist_id', $playlist_id);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}