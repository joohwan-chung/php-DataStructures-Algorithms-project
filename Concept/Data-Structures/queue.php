<?php
  /**
   * 사용 php 버전 : 7.4.33
   */
  class Queue
  {
    // MARK: php 7.2 버전에서는, 타입 힌트를 멤버 변수에서 사용할 수 없습니다. (아래 코드에서는 array 타입 힌트를 제거해야 실행됩니다.)
    protected array $items = [];

    public function enqueue($item) {
      $this->items[] = $item;
    }

    public function dequeue() {
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

    public function __toString() {
      return 'Queue Object';
    }
  }

  class GeneratePodcastAudio
  {
    public function handle() {
      return 'GeneratePodcastAudio execute';
    }

    public function __toString() {
      return $this->handle();
    }
  }

  class PublishPodcastAudio
  {
    public function handle() {
      return 'PublishPodcastAudio execute';
    }

    public function __toString() {
      return $this->handle();
    }
  }

  $queue = new Queue();
  $generatePodcastAudio = new GeneratePodcastAudio();
  $publishPodcastAudio = new PublishPodcastAudio();

  // $queue->enqueue('item1'); // 'item1'를 enqueue
  // $queue->enqueue('item2'); // 'item2'를 enqueue
  // $item = $queue->dequeue(); // dequeue한 값을 $item에 저장

  // echo 'current queue : ' . $item . "\n";
  
  $queue->enqueue($generatePodcastAudio); // GeneratePodcastAudio 인스턴스를 enqueue
  $queue->enqueue($publishPodcastAudio);   // PublishPodcastAudio 인스턴스를 enqueue

  $audio1 = $queue->dequeue(); // dequeue한 값을 $audio1에 저장
  $audio2 = $queue->dequeue(); // dequeue한 값을 $audio2에 저장

  echo 'audio1 : ' . $audio1 . "\n";
  echo 'audio2 : ' . $audio2 . "\n";
  echo 'GeneratePodcastAudio handle() : ' . $audio1->handle() . "\n"; // GeneratePodcastAudio의 handle() 메서드 실행
  echo 'PublishPodcastAudio handle() : ' . $audio2->handle() . "\n"; // PublishPodcastAudio의 handle() 메서드 실행
  echo 'queue : ' . $queue . "\n";
?>