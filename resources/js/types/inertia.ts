// resources/js/types/inertia.ts
import { Errors, PageProps as InertiaPageProps, VisitOptions } from '@inertiajs/core';
import { ErrorBag } from '@inertiajs/core';

export interface User {
  id: number;
  name: string;
  email: string;
  // Ajusta según tu modelo
  ID: string;
  EMAIL: string;
}

export interface Auth {
  user: User | null;
}

export type PageProps = InertiaPageProps & {
  auth: Auth;
  errors: Errors & ErrorBag;
  deferred?: Record<string, VisitOptions["only"]>;
};