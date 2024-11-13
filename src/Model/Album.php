<?php

namespace App\Model;


class Album 
{
    public function __construct(
        private int $id,
        private string $titulo,
        private string $name,
        private int $anyo,
        private string $genero,
        private array $canciones,
        private AlbumStatusEnum $status,
    ) {
    }

        /**
         * Get the value of id
         */
        public function getId(): int
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId(int $id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of titulo
         */
        public function getTitulo(): string
        {
                return $this->titulo;
        }

        /**
         * Set the value of titulo
         */
        public function setTitulo(string $titulo): self
        {
                $this->titulo = $titulo;

                return $this;
        }

        /**
         * Get the value of artista
         */
        public function getName(): string
        {
                return $this->name;
        }

        /**
         * Set the value of artista
         */
        public function setName(string $name): self
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of anyo
         */
        public function getAnyo(): int
        {
                return $this->anyo;
        }

        /**
         * Set the value of anyo
         */
        public function setAnyo(int $anyo): self
        {
                $this->anyo = $anyo;

                return $this;
        }

        /**
         * Get the value of genero
         */
        public function getGenero(): string
        {
                return $this->genero;
        }

        /**
         * Set the value of genero
         */
        public function setGenero(string $genero): self
        {
                $this->genero = $genero;

                return $this;
        }

        /**
         * Get the value of canciones
         */
        public function getCanciones(): array
        {
                return $this->canciones;
        }

        /**
         * Set the value of canciones
         */
        public function setCanciones(array $canciones): self
        {
                $this->canciones = $canciones;

                return $this;
        }

        /**
         * Get the value of status
         */
        public function getStatus(): AlbumStatusEnum
        {
                return $this->status;
        }
        public function getStatusString(): string
        {
                return $this->status->value;
        }
        public function getStatusImageFilename(): string
        {
                return match ($this->status) {
                        AlbumStatusEnum::WAITING => "images/status-waiting.png",
                        AlbumStatusEnum::INPROGRESS => "images/status-in-progress.png",
                        AlbumStatusEnum::COMPLETE =>"images/status-complete.png",
                };

        }

}
