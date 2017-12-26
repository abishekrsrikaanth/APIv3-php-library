<?php
/**
 * ListsApi
 * PHP version 5
 *
 * @category Class
 * @package  SendinBlue\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * SendinBlue API
 *
 * SendinBlue provide a RESTFul API that can be used with any languages. With this API, you will be able to :   - Manage your campaigns and get the statistics   - Manage your contacts   - Send transactional Emails and SMS   - and much more...  You can download our wrappers at https://github.com/orgs/sendinblue  **Possible responses**   | Code | Message |   | :-------------: | ------------- |   | 200  | OK. Successful Request  |   | 201  | OK. Successful Creation |   | 202  | OK. Request accepted |   | 204  | OK. Successful Update/Deletion  |   | 400  | Error. Bad Request  |   | 401  | Error. Authentication Needed  |   | 402  | Error. Not enough credit, plan upgrade needed  |   | 403  | Error. Permission denied  |   | 404  | Error. Object does not exist |   | 405  | Error. Method not allowed  |
 *
 * OpenAPI spec version: 3.0.0
 * Contact: contact@sendinblue.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SendinBlue\Client\Api;

use \SendinBlue\Client\ApiClient;
use \SendinBlue\Client\ApiException;
use \SendinBlue\Client\Configuration;
use \SendinBlue\Client\ObjectSerializer;

/**
 * ListsApi Class Doc Comment
 *
 * @category Class
 * @package  SendinBlue\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ListsApi
{
    /**
     * API Client
     *
     * @var \SendinBlue\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \SendinBlue\Client\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\SendinBlue\Client\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \SendinBlue\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \SendinBlue\Client\ApiClient $apiClient set the API client
     *
     * @return ListsApi
     */
    public function setApiClient(\SendinBlue\Client\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation addContactToList
     *
     * Add existing contacts to a list
     *
     * @param int $listId Id of the list (required)
     * @param \SendinBlue\Client\Model\AddRemoveContactToList $contactEmails Emails addresses of the contacts (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return \SendinBlue\Client\Model\PostContactInfo
     */
    public function addContactToList($listId, $contactEmails)
    {
        list($response) = $this->addContactToListWithHttpInfo($listId, $contactEmails);
        return $response;
    }

    /**
     * Operation addContactToListWithHttpInfo
     *
     * Add existing contacts to a list
     *
     * @param int $listId Id of the list (required)
     * @param \SendinBlue\Client\Model\AddRemoveContactToList $contactEmails Emails addresses of the contacts (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of \SendinBlue\Client\Model\PostContactInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function addContactToListWithHttpInfo($listId, $contactEmails)
    {
        // verify the required parameter 'listId' is set
        if ($listId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $listId when calling addContactToList');
        }
        // verify the required parameter 'contactEmails' is set
        if ($contactEmails === null) {
            throw new \InvalidArgumentException('Missing the required parameter $contactEmails when calling addContactToList');
        }
        // parse inputs
        $resourcePath = "/contacts/lists/{listId}/contacts/add";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($listId !== null) {
            $resourcePath = str_replace(
                "{" . "listId" . "}",
                $this->apiClient->getSerializer()->toPathValue($listId),
                $resourcePath
            );
        }
        // body params
        $_tempBody = null;
        if (isset($contactEmails)) {
            $_tempBody = $contactEmails;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SendinBlue\Client\Model\PostContactInfo',
                '/contacts/lists/{listId}/contacts/add'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SendinBlue\Client\Model\PostContactInfo', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\PostContactInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation createList
     *
     * Create a list
     *
     * @param \SendinBlue\Client\Model\CreateList $createList Values to create a list (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return \SendinBlue\Client\Model\CreateModel
     */
    public function createList($createList)
    {
        list($response) = $this->createListWithHttpInfo($createList);
        return $response;
    }

    /**
     * Operation createListWithHttpInfo
     *
     * Create a list
     *
     * @param \SendinBlue\Client\Model\CreateList $createList Values to create a list (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of \SendinBlue\Client\Model\CreateModel, HTTP status code, HTTP response headers (array of strings)
     */
    public function createListWithHttpInfo($createList)
    {
        // verify the required parameter 'createList' is set
        if ($createList === null) {
            throw new \InvalidArgumentException('Missing the required parameter $createList when calling createList');
        }
        // parse inputs
        $resourcePath = "/contacts/lists";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // body params
        $_tempBody = null;
        if (isset($createList)) {
            $_tempBody = $createList;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SendinBlue\Client\Model\CreateModel',
                '/contacts/lists'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SendinBlue\Client\Model\CreateModel', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\CreateModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation deleteList
     *
     * Delete a list
     *
     * @param int $listId Id of the list (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return void
     */
    public function deleteList($listId)
    {
        list($response) = $this->deleteListWithHttpInfo($listId);
        return $response;
    }

    /**
     * Operation deleteListWithHttpInfo
     *
     * Delete a list
     *
     * @param int $listId Id of the list (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteListWithHttpInfo($listId)
    {
        // verify the required parameter 'listId' is set
        if ($listId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $listId when calling deleteList');
        }
        // parse inputs
        $resourcePath = "/contacts/lists/{listId}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($listId !== null) {
            $resourcePath = str_replace(
                "{" . "listId" . "}",
                $this->apiClient->getSerializer()->toPathValue($listId),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'DELETE',
                $queryParams,
                $httpBody,
                $headerParams,
                null,
                '/contacts/lists/{listId}'
            );

            return [null, $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getContactsFromList
     *
     * Get the contacts in a list
     *
     * @param int $listId Id of the list (required)
     * @param \DateTime $modifiedSince Filter (urlencoded) the contacts modified after a given UTC date-time (YYYY-MM-DDTHH:mm:ss.SSSZ) (optional)
     * @param int $limit Number of documents per page (optional, default to 50)
     * @param int $offset Index of the first document of the page (optional, default to 0)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return \SendinBlue\Client\Model\GetContacts
     */
    public function getContactsFromList($listId, $modifiedSince = null, $limit = '50', $offset = '0')
    {
        list($response) = $this->getContactsFromListWithHttpInfo($listId, $modifiedSince, $limit, $offset);
        return $response;
    }

    /**
     * Operation getContactsFromListWithHttpInfo
     *
     * Get the contacts in a list
     *
     * @param int $listId Id of the list (required)
     * @param \DateTime $modifiedSince Filter (urlencoded) the contacts modified after a given UTC date-time (YYYY-MM-DDTHH:mm:ss.SSSZ) (optional)
     * @param int $limit Number of documents per page (optional, default to 50)
     * @param int $offset Index of the first document of the page (optional, default to 0)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of \SendinBlue\Client\Model\GetContacts, HTTP status code, HTTP response headers (array of strings)
     */
    public function getContactsFromListWithHttpInfo($listId, $modifiedSince = null, $limit = '50', $offset = '0')
    {
        // verify the required parameter 'listId' is set
        if ($listId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $listId when calling getContactsFromList');
        }
        if (!is_null($limit) && ($limit > 500)) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling ListsApi.getContactsFromList, must be smaller than or equal to 500.');
        }

        // parse inputs
        $resourcePath = "/contacts/lists/{listId}/contacts";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($modifiedSince !== null) {
            $queryParams['modifiedSince'] = $this->apiClient->getSerializer()->toQueryValue($modifiedSince);
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $this->apiClient->getSerializer()->toQueryValue($limit);
        }
        // query params
        if ($offset !== null) {
            $queryParams['offset'] = $this->apiClient->getSerializer()->toQueryValue($offset);
        }
        // path params
        if ($listId !== null) {
            $resourcePath = str_replace(
                "{" . "listId" . "}",
                $this->apiClient->getSerializer()->toPathValue($listId),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SendinBlue\Client\Model\GetContacts',
                '/contacts/lists/{listId}/contacts'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SendinBlue\Client\Model\GetContacts', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\GetContacts', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getFolderLists
     *
     * Get the lists in a folder
     *
     * @param int $folderId Id of the folder (required)
     * @param int $limit Number of documents per page (optional, default to 10)
     * @param int $offset Index of the first document of the page (optional, default to 0)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return \SendinBlue\Client\Model\GetFolderLists
     */
    public function getFolderLists($folderId, $limit = '10', $offset = '0')
    {
        list($response) = $this->getFolderListsWithHttpInfo($folderId, $limit, $offset);
        return $response;
    }

    /**
     * Operation getFolderListsWithHttpInfo
     *
     * Get the lists in a folder
     *
     * @param int $folderId Id of the folder (required)
     * @param int $limit Number of documents per page (optional, default to 10)
     * @param int $offset Index of the first document of the page (optional, default to 0)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of \SendinBlue\Client\Model\GetFolderLists, HTTP status code, HTTP response headers (array of strings)
     */
    public function getFolderListsWithHttpInfo($folderId, $limit = '10', $offset = '0')
    {
        // verify the required parameter 'folderId' is set
        if ($folderId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $folderId when calling getFolderLists');
        }
        if (!is_null($limit) && ($limit > 50)) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling ListsApi.getFolderLists, must be smaller than or equal to 50.');
        }

        // parse inputs
        $resourcePath = "/contacts/folders/{folderId}/lists";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $this->apiClient->getSerializer()->toQueryValue($limit);
        }
        // query params
        if ($offset !== null) {
            $queryParams['offset'] = $this->apiClient->getSerializer()->toQueryValue($offset);
        }
        // path params
        if ($folderId !== null) {
            $resourcePath = str_replace(
                "{" . "folderId" . "}",
                $this->apiClient->getSerializer()->toPathValue($folderId),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SendinBlue\Client\Model\GetFolderLists',
                '/contacts/folders/{folderId}/lists'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SendinBlue\Client\Model\GetFolderLists', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\GetFolderLists', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getList
     *
     * Get the details of a list
     *
     * @param int $listId Id of the list (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return \SendinBlue\Client\Model\GetExtendedList
     */
    public function getList($listId)
    {
        list($response) = $this->getListWithHttpInfo($listId);
        return $response;
    }

    /**
     * Operation getListWithHttpInfo
     *
     * Get the details of a list
     *
     * @param int $listId Id of the list (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of \SendinBlue\Client\Model\GetExtendedList, HTTP status code, HTTP response headers (array of strings)
     */
    public function getListWithHttpInfo($listId)
    {
        // verify the required parameter 'listId' is set
        if ($listId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $listId when calling getList');
        }
        // parse inputs
        $resourcePath = "/contacts/lists/{listId}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($listId !== null) {
            $resourcePath = str_replace(
                "{" . "listId" . "}",
                $this->apiClient->getSerializer()->toPathValue($listId),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SendinBlue\Client\Model\GetExtendedList',
                '/contacts/lists/{listId}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SendinBlue\Client\Model\GetExtendedList', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\GetExtendedList', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getLists
     *
     * Get all the lists
     *
     * @param int $limit Number of documents per page (optional, default to 10)
     * @param int $offset Index of the first document of the page (optional, default to 0)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return \SendinBlue\Client\Model\GetLists
     */
    public function getLists($limit = '10', $offset = '0')
    {
        list($response) = $this->getListsWithHttpInfo($limit, $offset);
        return $response;
    }

    /**
     * Operation getListsWithHttpInfo
     *
     * Get all the lists
     *
     * @param int $limit Number of documents per page (optional, default to 10)
     * @param int $offset Index of the first document of the page (optional, default to 0)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of \SendinBlue\Client\Model\GetLists, HTTP status code, HTTP response headers (array of strings)
     */
    public function getListsWithHttpInfo($limit = '10', $offset = '0')
    {
        if (!is_null($limit) && ($limit > 50)) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling ListsApi.getLists, must be smaller than or equal to 50.');
        }

        // parse inputs
        $resourcePath = "/contacts/lists";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $this->apiClient->getSerializer()->toQueryValue($limit);
        }
        // query params
        if ($offset !== null) {
            $queryParams['offset'] = $this->apiClient->getSerializer()->toQueryValue($offset);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SendinBlue\Client\Model\GetLists',
                '/contacts/lists'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SendinBlue\Client\Model\GetLists', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\GetLists', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation removeContactToList
     *
     * Remove existing contacts from a list
     *
     * @param int $listId Id of the list (required)
     * @param \SendinBlue\Client\Model\AddRemoveContactToList $contactEmails Emails adresses of the contact (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return \SendinBlue\Client\Model\PostContactInfo
     */
    public function removeContactToList($listId, $contactEmails)
    {
        list($response) = $this->removeContactToListWithHttpInfo($listId, $contactEmails);
        return $response;
    }

    /**
     * Operation removeContactToListWithHttpInfo
     *
     * Remove existing contacts from a list
     *
     * @param int $listId Id of the list (required)
     * @param \SendinBlue\Client\Model\AddRemoveContactToList $contactEmails Emails adresses of the contact (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of \SendinBlue\Client\Model\PostContactInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function removeContactToListWithHttpInfo($listId, $contactEmails)
    {
        // verify the required parameter 'listId' is set
        if ($listId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $listId when calling removeContactToList');
        }
        // verify the required parameter 'contactEmails' is set
        if ($contactEmails === null) {
            throw new \InvalidArgumentException('Missing the required parameter $contactEmails when calling removeContactToList');
        }
        // parse inputs
        $resourcePath = "/contacts/lists/{listId}/contacts/remove";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($listId !== null) {
            $resourcePath = str_replace(
                "{" . "listId" . "}",
                $this->apiClient->getSerializer()->toPathValue($listId),
                $resourcePath
            );
        }
        // body params
        $_tempBody = null;
        if (isset($contactEmails)) {
            $_tempBody = $contactEmails;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SendinBlue\Client\Model\PostContactInfo',
                '/contacts/lists/{listId}/contacts/remove'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SendinBlue\Client\Model\PostContactInfo', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\PostContactInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation updateList
     *
     * Update a list
     *
     * @param int $listId Id of the list (required)
     * @param \SendinBlue\Client\Model\UpdateList $updateList Values to update a list (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return void
     */
    public function updateList($listId, $updateList)
    {
        list($response) = $this->updateListWithHttpInfo($listId, $updateList);
        return $response;
    }

    /**
     * Operation updateListWithHttpInfo
     *
     * Update a list
     *
     * @param int $listId Id of the list (required)
     * @param \SendinBlue\Client\Model\UpdateList $updateList Values to update a list (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateListWithHttpInfo($listId, $updateList)
    {
        // verify the required parameter 'listId' is set
        if ($listId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $listId when calling updateList');
        }
        // verify the required parameter 'updateList' is set
        if ($updateList === null) {
            throw new \InvalidArgumentException('Missing the required parameter $updateList when calling updateList');
        }
        // parse inputs
        $resourcePath = "/contacts/lists/{listId}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($listId !== null) {
            $resourcePath = str_replace(
                "{" . "listId" . "}",
                $this->apiClient->getSerializer()->toPathValue($listId),
                $resourcePath
            );
        }
        // body params
        $_tempBody = null;
        if (isset($updateList)) {
            $_tempBody = $updateList;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                null,
                '/contacts/lists/{listId}'
            );

            return [null, $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
