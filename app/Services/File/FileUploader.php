<?php

namespace App\Services\File;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class FileUploader
{
    protected string $disk = "public";

    /**
     * Télécharge un fichier sur le disque spécifié.
     *
     * @param UploadedFile|null $file Le fichier à télécharger.
     * @param string $path Le chemin de destination sur le disque.
     * @param bool $optimize Indique si le fichier doit être optimisé (images uniquement).
     * @return string|null Le chemin du fichier téléchargé ou null.
     * @throws \Exception En cas d'erreur.
     */
    public function upload(?UploadedFile $file, string $path, bool $optimize = true): ?string
    {
        if (null === $file) {
            return null;
        }

        try {
            // Optimiser les images si demandé
            if ($optimize && $this->isImage($file)) {
                $optimizedFile = $this->optimizeImage($file);
                $filePath = $path . '/' . $file->hashName();
                Storage::disk($this->disk)->put($filePath, $optimizedFile);
                return $filePath;
            }

            // Stocker le fichier directement
            return $file->store($path, $this->disk);
        } catch (\Exception $e) {
            throw new \RuntimeException('Erreur lors du téléchargement du fichier : ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Supprime un fichier du disque.
     *
     * @param string $path Le chemin du fichier à supprimer.
     * @return bool Indique si la suppression a réussi.
     * @throws \Exception En cas d'erreur.
     */
    public function delete(string $path): bool
    {
        try {
            return Storage::disk($this->disk)->delete($path);
        } catch (\Exception $e) {
            throw new \RuntimeException('Erreur lors de la suppression du fichier : ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Vérifie si un fichier est une image.
     *
     * @param UploadedFile $file Le fichier à vérifier.
     * @return bool
     */
    protected function isImage(UploadedFile $file): bool
    {
        return in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']);
    }

    /**
     * Optimise une image en la compressant et en ajustant sa taille.
     *
     * @param UploadedFile $file Le fichier image à optimiser.
     * @return string Le contenu binaire de l'image optimisée.
     */
    protected function optimizeImage(UploadedFile $file): string
    {
        // Crée une instance Intervention Image
        $image = Image::read($file);

        // Redimensionner l'image avec une largeur maximale de 1920px
        $image->resize(640, 480);

        // Sauvegarde temporaire dans un fichier et retourne son contenu
        $tempPath = tempnam(sys_get_temp_dir(), 'optimized_');
        $image->save($tempPath, 75); // Compression à 75%

        $content = file_get_contents($tempPath);
        unlink($tempPath); // Nettoyage du fichier temporaire

        return $content;
    }
}
