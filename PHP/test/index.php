<?PHP
# Задание 1 

echo "Реализовать метод build и print в классе BTree"; 
# Класс описывающий вершину бинарного дерева
class Vertex {
    public $key;
    public $leftChild;
    public $rightChild;    
    
    public function __construct($key) {
        $this->key = $key;
        $this->leftChild = null;
        $this->rightChild = null;
        
    }
}

# Класс в котором создаются вершины и происходит формирование дерева 
class BTree {
    public $root;
    const vertex = [1,4,5,6,7,8,10];
    
    function __construct () {
        $this->root = null;
    }
    
    # вспомогательный метод который возвращает созданную вершину.
    function createVertex($key){
        return new Vertex($key); 
    }
    
    # создаем вершину и передаем в buildBTree
    function init() {
        foreach(self::vertex as $value) {
            $v = $this->createVertex($value); 
            $this->build($v); 
        }
    }
       
    function build (Vertex $child , $parent = null ) {
        echo "<pre>";
        print_r($child);
        echo "</pre>";
        # Реализуем логику поиска родителя исходя из правил формирования бинарного дерева
        
        if(!$this->root) {
            $this->root = $child;
            return;
        }
        
        if(!$parent) {
            $parent = $this->root;
        }
        
        if($child->key > $parent->key) {
            if(!$parent->rightChild) {
                $parent->rightChild = $child;
                return;
            } else {
                $this->build($child, $parent->rightChild);
            }
        } else {
            if(!$parent->leftChild) {
                $parent->leftChild = $child;
                return;
            } else {
                $this->build($child, $parent->leftChild);
            }
        }
        
    }
    
    /*function print() {
        # Выводим содержимое дерева. 
                
    }*/
        
}

$tree = new BTree();
$tree->init();
#$tree->print(); // вами реализованный метод показа сформированного дерева.

?>