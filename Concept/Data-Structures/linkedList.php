<?php
  /**
   * 사용 php 버전 : 7.4.33
   */
  class Node
  {
    // MARK: php 8.0 이후 버전부터만 아래 주석부분에 캡슐화 문법을 사용할 수 있습니다.
    // public function __construct(
    //   public $data,
    //   public Node|null $next = null,
    // ){}

    public $data;
    public $next;

    public function __construct($data, $next = null) {
      $this->data = $data;
      $this->next = $next;
    }
  }
  
  class LinkedList
  {
    // MARK: php 7.4 에서는 | nullable 타입 힌트를 사용할 수 없습니다.
    // public Node|null $head = null;

    public $head = null;

    public function add($value) {
      if ($this->head === null) {
        $this->head = new Node($value);
        return;
      }

      $parent = $this->head;

      while ($parent->next !== null) {
        $parent = $parent->next;
      }

      $parent->next = new Node($value);
    }
  }

  // LinkedList 인스턴스 생성
  $linkedList = new LinkedList();

  // 값 추가
  $linkedList->add(1);
  $linkedList->add(2);
  $linkedList->add(3);

  // 출력
  $current = $linkedList->head;
  while ($current !== null) {
    echo $current->data . " -> ";
    $current = $current->next;
  }
  echo "null\n";
?>
