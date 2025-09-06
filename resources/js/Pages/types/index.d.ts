export interface User {
    id: number;
    name: string;
    email: string;
    password: string;
    remember: boolean;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    },
    flash: {
        success: string;
        error: string;
    };
};