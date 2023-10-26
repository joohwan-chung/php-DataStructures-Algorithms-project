<?php
  /**
   * 사용 php 버전 : 7.4.33
   */
  class Stack
  {
    // MARK: php 7.2 버전에서는, 타입 힌트를 멤버 변수에서 사용할 수 없습니다. (아래 코드에서는 array 타입 힌트를 제거해야 실행됩니다.)
    protected array $items = [];

    public function push($item) {
      array_unshift($this->items, $item);
    }

    public function pop() {
      return array_shift($this->items);
    }

    public function peek() {
      return $this->items[0];
    }

    public function size(): int {
      return count($this->items);
    }

    public function isEmpty(): bool {
      // return empty($this->items);
      return $this->size() === 0;
    }
  }

  $names = new Stack();
  $names->push('Ryan');
  $names->push('Joe');
  $names->push('Jane');
  $names->push('Paul');
  $names->push('Chris');
  
  echo 'current popped stack : ' . $names->pop() . "\n";
  echo 'current stack peek : ' . $names->peek() . "\n";
  echo 'current stack size : ' . $names->size() . "\n";
  echo 'Is stack empty? : ' . ($names->isEmpty() ? 'true' : 'false') . "\n";
?>