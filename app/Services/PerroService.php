<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class PerroService
{
    // Return multiple random dog images from a sub-breed
    public function multipleImagesFromASubBreedCollection($breed, $subBreed, $num)
    {
        try {
            $response = Http::get('https://dog.ceo/api/breed/' . $breed . '/' . $subBreed . '/images/random/' . $num);


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    public function singleRandomImageFromASubBreedCollection($breed, $subBreed)
    {
        try {
            $response = Http::get('https://dog.ceo/api/breed/' . $breed . '/' . $subBreed . '/images/random');


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // Returns an array of all the images from the sub-breed
    public function listAllSubBreedImages($breed, $subBreed)
    {
        try {
            $response = Http::get('https://dog.ceo/api/breed/' . $breed . '/' . $subBreed . '/images');


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // Returns an array of all the sub-breeds from a breed
    public function listAllSubBreeds($breed)
    {
        try {
            $response = Http::get('https://dog.ceo/api/breed/' . $breed . '/list');


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // Return multiple random dog image from a breed
    public function multipleImagesFromABreedCollection($breed, $num)
    {
        try {
            $response = Http::get('https://dog.ceo/api/breed/' . $breed . '/images/random/' . $num);


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    public function randomDogImageFromABreed($breed)
    {
        try {
            $response = Http::get('https://dog.ceo/api/breed/' . $breed . '/images/random');


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // Returns an array of all the images from a breed
    public function byBreed($breed)
    {
        try {
            $response = Http::get('https://dog.ceo/api/breed/' . $breed . '/images');


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    /*DISPLAY MULTIPLE RANDOM IMAGES FROM ALL DOGS COLLECTION. Max number returned is 50.  */
    public function multipleRandomImagesFromAllDogsCollection($num)
    {
        try {
            $response = Http::get('https://dog.ceo/api/breeds/image/random/' . $num);


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /*DISPLAY MULTIPLE RANDOM IMAGES FROM ALL DOGS COLLECTION. Max number returned is 50.  */
    public function maxNumberOfRandomImagesFromAllDogsCollection()
    {
        try {
            $response = Http::get('https://dog.ceo/api/breeds/image/random/50');


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function singleRandomImageFromAllDogsCollection()
    {
        try {
            $response = Http::get('https://dog.ceo/api/breeds/image/random');


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function listAllBreeds()
    {
        try {
            $response = Http::get('https://dog.ceo/api/breeds/list/all');


            if ($response->successful()) {
                return ["body" => $response->json(), "status" => $response->status()];
            }
            if ($response->failed()) {
                return ["body" => "fallo de informacion", "status" => $response->status()];
            }
            if ($response->clientError()) {
                return ["body" => " fallo de comunicacion", "status" => $response->status()];
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "linea" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
