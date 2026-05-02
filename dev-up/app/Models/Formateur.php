<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formateur extends User
{
    use HasFactory;

    protected $table = 'users';

    public function scopeFormateurs($query)
    {
        return $query->where('role', 'formateur');
    }

    public function examinerSoumission(int $soumissionId)
    {
        return Submission::with(['user', 'challenge', 'feedback'])
            ->find($soumissionId);
    }

    public function ajouterFeedback(int $soumissionId, string $commentaire, int $note)
    {
        $submission = Submission::find($soumissionId);
        
        if (!$submission) {
            return false;
        }

        $feedback = Feedback::create([
            'formateur_id' => $this->id,
            'soumission_id' => $soumissionId,
            'commentaire' => $commentaire,
            'note' => $note,
        ]);

        // Update submission status and feedback
        $submission->update([
            'status' => $note >= 10 ? 'valide' : 'refuse',
            'feedback' => $commentaire,
        ]);

        return $feedback;
    }
}
