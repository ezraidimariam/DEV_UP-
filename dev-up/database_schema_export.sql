-- DEV_UP Database Schema Export
-- Core tables for the learning platform

-- Users table with role-based system
CREATE TABLE users (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    level INTEGER DEFAULT 1 CHECK (level >= 1 AND level <= 10),
    points INTEGER DEFAULT 0 CHECK (points >= 0),
    role VARCHAR(20) DEFAULT 'apprenant' CHECK (role IN ('admin', 'formateur', 'apprenant')),
    serie_actuelle VARCHAR(255),
    email_verified_at TIMESTAMP NULL,
    remember_token VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Categories for organizing challenges
CREATE TABLE categories (
    id BIGSERIAL PRIMARY KEY,
    nom VARCHAR(255) UNIQUE NOT NULL,
    description TEXT,
    icone VARCHAR(255),
    couleur VARCHAR(7),
    is_active BOOLEAN DEFAULT TRUE,
    ordre INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Challenges table
CREATE TABLE challenges (
    id BIGSERIAL PRIMARY KEY,
    categorie_id BIGINT REFERENCES categories(id) ON DELETE CASCADE,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    difficulte VARCHAR(20) DEFAULT 'debutant' CHECK (difficulte IN ('debutant', 'intermediaire', 'avance', 'expert')),
    valeur_points INTEGER DEFAULT 0 CHECK (valeur_points >= 0),
    date_limite TIMESTAMP,
    is_active BOOLEAN DEFAULT TRUE,
    created_by BIGINT REFERENCES users(id) ON DELETE SET NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Questions within challenges
CREATE TABLE questions (
    id BIGSERIAL PRIMARY KEY,
    challenge_id BIGINT REFERENCES challenges(id) ON DELETE CASCADE,
    enonce TEXT NOT NULL,
    type VARCHAR(20) DEFAULT 'texte' CHECK (type IN ('qcm', 'code', 'texte', 'vrai_faux')),
    points INTEGER DEFAULT 0 CHECK (points >= 0),
    ordre INTEGER DEFAULT 0,
    explication TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- User responses to questions
CREATE TABLE reponses (
    id BIGSERIAL PRIMARY KEY,
    question_id BIGINT REFERENCES questions(id) ON DELETE CASCADE,
    user_id BIGINT REFERENCES users(id) ON DELETE CASCADE,
    contenu TEXT NOT NULL,
    est_correcte BOOLEAN DEFAULT FALSE,
    points_obtenus INTEGER DEFAULT 0 CHECK (points_obtenus >= 0),
    temps_reponse INTEGER,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Focus sessions (Pomodoro timer)
CREATE TABLE focus_sessions (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT REFERENCES users(id) ON DELETE CASCADE,
    focus_duration INTEGER NOT NULL CHECK (focus_duration > 0 AND focus_duration <= 120),
    break_duration INTEGER NOT NULL CHECK (break_duration > 0 AND break_duration <= 30),
    date_session TIMESTAMP NOT NULL,
    is_completed BOOLEAN DEFAULT FALSE,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Challenge submissions
CREATE TABLE submissions (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT REFERENCES users(id) ON DELETE CASCADE,
    challenge_id BIGINT REFERENCES challenges(id) ON DELETE CASCADE,
    contenu TEXT NOT NULL,
    fichier VARCHAR(255),
    feedback TEXT,
    note INTEGER CHECK (note >= 0 AND note <= 100),
    statut VARCHAR(20) DEFAULT 'en_attente' CHECK (statut IN ('en_attente', 'en_cours', 'termine', 'rejete')),
    date_soumission TIMESTAMP NOT NULL,
    date_evaluation TIMESTAMP,
    evaluated_by BIGINT REFERENCES users(id) ON DELETE SET NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- User progress tracking
CREATE TABLE progressions (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT REFERENCES users(id) ON DELETE CASCADE,
    challenge_id BIGINT REFERENCES challenges(id) ON DELETE CASCADE,
    niveau_actuel INTEGER DEFAULT 1 CHECK (niveau_actuel >= 1 AND niveau_actuel <= 10),
    points_obtenus INTEGER DEFAULT 0 CHECK (points_obtenus >= 0),
    pourcentage_completion DECIMAL(5,2) DEFAULT 0.00 CHECK (pourcentage_completion >= 0 AND pourcentage_completion <= 100),
    date_debut TIMESTAMP NOT NULL,
    date_fin TIMESTAMP,
    derniere_activite TIMESTAMP NOT NULL,
    statut VARCHAR(20) DEFAULT 'en_cours' CHECK (statut IN ('en_cours', 'termine', 'abandonne')),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Many-to-many relationship between users and challenges
CREATE TABLE user_challenges (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT REFERENCES users(id) ON DELETE CASCADE,
    challenge_id BIGINT REFERENCES challenges(id) ON DELETE CASCADE,
    statut VARCHAR(20) DEFAULT 'non_commence' CHECK (statut IN ('non_commence', 'en_cours', 'termine')),
    date_debut TIMESTAMP,
    date_fin TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(user_id, challenge_id)
);

-- Indexes for performance optimization
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_users_role ON users(role);
CREATE INDEX idx_challenges_categorie ON challenges(categorie_id);
CREATE INDEX idx_challenges_difficulte ON challenges(difficulte);
CREATE INDEX idx_questions_challenge ON questions(challenge_id);
CREATE INDEX idx_reponses_question ON reponses(question_id);
CREATE INDEX idx_reponses_user ON reponses(user_id);
CREATE INDEX idx_focus_sessions_user ON focus_sessions(user_id);
CREATE INDEX idx_submissions_user ON submissions(user_id);
CREATE INDEX idx_submissions_challenge ON submissions(challenge_id);
CREATE INDEX idx_progressions_user ON progressions(user_id);
CREATE INDEX idx_progressions_challenge ON progressions(challenge_id);
CREATE INDEX idx_user_challenges_user ON user_challenges(user_id);
CREATE INDEX idx_user_challenges_challenge ON user_challenges(challenge_id);
