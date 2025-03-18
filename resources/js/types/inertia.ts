// resources/js/types/inertia.ts
import { Errors, PageProps as InertiaPageProps, VisitOptions } from '@inertiajs/core'; // Añade VisitOptions
import { ErrorBag } from '@inertiajs/core';

export interface User {
  id: number;
  name: string;
  email: string; // Ajusta según los campos de tu modelo Usuario
  // Añade otros campos que tu modelo tenga (ID_ROLE, etc.)
}

export interface Auth {
  user: User | null;
}

export type PageProps = InertiaPageProps & {
  auth: Auth;
  errors: Errors & ErrorBag;
  deferred?: Record<string, VisitOptions["only"]>; // Ahora VisitOptions está definido
};