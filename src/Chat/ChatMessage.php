<?php
namespace App\Chat;

use Symfony\Component\HttpFoundation\Request;

class ChatMessage
{
    public ?int $id;

    public string $createdAt;

    public string $pseudo;

    public string $content;

    public int $userId;

    public function __construct(Request $request)
    {
        $this->pseudo = $request->request->get('pseudo');
        $this->content = $request->request->get('content');
        $date = new \DateTime();
        $this->createdAt = $date->format('Y-m-d H:i:s');
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
        return $this;
    }
}
