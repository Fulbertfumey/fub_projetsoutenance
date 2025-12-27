<?php
// app/Http/Controllers/MessageController.php
namespace App\Http\Controllers;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller {

    public function index() {
    $conversations = Auth::user()->conversations()->with('reservation')->latest()->get();
    return view('messages.index', compact('conversations'));
}

    public function start(Reservation $reservation) {
        $user = Auth::user();
        $prestataireId = $reservation->offer->user_id;
        if (!in_array($user->id, [$reservation->client_id, $prestataireId])) abort(403);

        $conv = Conversation::firstOrCreate(['reservation_id'=>$reservation->id]);
        $conv->users()->syncWithoutDetaching([$reservation->client_id, $prestataireId]);

        return redirect()->route('conversations.show', $conv);
    }

    public function show(Conversation $conversation) {
        $this->authorizeConversation($conversation);
        $messages = $conversation->messages()->with('user')->latest()->paginate(30);
        return view('messages.show', compact('conversation','messages'));
    }

    public function send(Conversation $conversation, Request $request) {
        $this->authorizeConversation($conversation);
        $data = $request->validate(['contenu'=>'required|string|max:1000']);
        Message::create([
            'conversation_id'=>$conversation->id,
            'user_id'=>Auth::id(),
            'contenu'=>$data['contenu']
        ]);
        return back();
    }

    private function authorizeConversation(Conversation $conversation): void {
        $user = Auth::user();
        if (!$conversation->users->pluck('id')->contains($user->id)) abort(403);
    }
}
