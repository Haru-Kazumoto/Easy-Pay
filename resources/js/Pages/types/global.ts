export interface User {
    id: number;
    name: string;
    email: string;
    password: string;
    remember: boolean;
}

export interface Auth {
    user: User
}

