export interface RestReponse<T> {
    data: T | any
    message?: string
    success: boolean,
    links?:Link[]
}


export interface Link {
  url?: string;
  label: string;
  active: boolean;
}

