<?php
require 'vendor/autoload.php';
class SearchElastic
{
  private $elasticclient = null;
  public function __construct(){
    $this->elasticclient = Elasticsearch\ClientBuilder::create()->build();
  }
  public function Mapping(){
    $params = [
      'index' => 'tablets',
      'body' => [
        'mappings' => [
          // 'docType' => [
            'properties' => [
              'id' => [
                  'type' => 'integer',
              ],
              'tbName' => [
                  'type' => 'text',
              ],
              'cost' => [
                  'type' => 'float',
              ],
              'noOfTablets' => [
                  'type' => 'integer',
              ],
            ]
          // ]
        ],
      ]
    ];
    try{
      $this->elasticclient->indices()->create($params);
      return true;
    }
    catch(Exception $e){
      return false;
    }
  }
	public function InsertData($conn){
		$con = $conn;
		$client = $this->elasticclient;
		$sql = "SELECT * FROM tablets";
		$result = mysqli_query($con,"SELECT * FROM tablets");
		$params = null;
		while ($row = $result->fetch_assoc())
		{
		$params['body'][] = array(
		  'index' => array(
		    '_index' => 'tablets',
        // '_type' => 'docType',
        '_id' => $row["id"]
		  ) ,
		);
		$params['body'][] = ['tbName' => $row['tbName'], 'cost' => $row['cost'], 'noOfTablets' => $row['noOfTablets'],];
		}
		if($this->Mapping()){}
    else return;

		$responses = $client->bulk($params);
		return true;
	}
  public function InsertNode($articleid, $con)
   {
       $conn = $con;
       $client = $this->elasticclient;
       $stmt = "SELECT * FROM tablets WHERE id =".$articleid;
       $result = $con->query($stmt);
       $params = null;
       while ($row = $result->fetch_assoc()) {
           $params = ['index' => 'tablets','id' => $row['id'], 'body' => ['tbName' => $row['tbName'], 'cost' => $row['cost'], 'noOfTablets' => $row['noOfTablets'], ]];
       }
       $responses = $client->index($params);
       return true;
   }
   public function UpdateNode($articleid, $con)
   {
       $conn = $con;
       $client = $this->elasticclient;
       $stmt = "SELECT * FROM tablets WHERE id =".$articleid;
       $result = $con->query($stmt);
       $params = null;
       while ($row = $result->fetch_assoc()) {
           $params = ['index' => 'tablets', 'id' => $row['id'], 'body' => ['tbName' => $row['tbName'], 'cost' => $row['cost'], 'noOfTablets' => $row['noOfTablets'], ]];
       }
       $responses = $client->update($params);
       return true;
   }
   public function DeleteNode($id)
   {
       $client = $this->elasticclient;
       $params = ['index' => 'tablets', 'id' => $id, ];
       $responses = $client->delete($params);
       return true;
   }
    public function Search($query)
   {
       $client = $this->elasticclient;
       $result = array();
       $i = 0;
       $json = '{
           "query": {
               "match_all": {}
           }
       }';
       if($query==""){
        $params = ['index' => 'tablets', 'body' => $json ];
       }else{
        $params = ['index' => 'tablets', 'body' => ['query' => ['wildcard'=> ["tbName"=> ["value"=> "*".$query."*"]] ], ], ];
       }
       // 'fuzzy' => ['tbName' => ["value"=> $query,'fuzziness'=> '2'], ],
       $query = $client->search($params);
       $hits = sizeof($query['hits']['hits']);
       $hit = $query['hits']['hits'];
       $result['searchfound'] = $hits;
       while ($i < $hits) {
           $result['result'][$i] = $query['hits']['hits'][$i];
           $i++;
       }
       return $result;
   }
}
?>

