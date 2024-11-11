export type Auth={
    name?:String,
    email:String,
    password?:String,
    confirmpassword?:String,
    notification?: boolean;
    role?: string;
    remember?: boolean
    processing?: boolean
}
